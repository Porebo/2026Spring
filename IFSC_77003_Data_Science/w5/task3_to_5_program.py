"""Processing pipeline for Tasks 3-5: Gaussian blur, thresholding, Prewitt edges."""
from __future__ import annotations

from pathlib import Path
from typing import Iterable, Tuple

import matplotlib.pyplot as plt
import numpy as np
from PIL import Image

BASE_DIR = Path(__file__).parent
ORIGINALS = BASE_DIR / "images" / "originals"
PROCESSED = BASE_DIR / "images" / "processed"
PROCESSED.mkdir(parents=True, exist_ok=True)


def load_grayscale(image_name: str) -> np.ndarray:
    path = ORIGINALS / image_name
    if not path.exists():
        raise FileNotFoundError(path)
    with Image.open(path) as img:
        gray = img.convert("L")
        array = np.asarray(gray, dtype=np.uint8)
    return array


def save_array_as_image(array: np.ndarray, destination: Path) -> None:
    Image.fromarray(array.astype(np.uint8)).save(destination)
    print(f"Saved {destination.name}: shape={array.shape}")


def gaussian_kernel(size: int = 7, sigma: float = 1.25) -> np.ndarray:
    assert size % 2 == 1, "Kernel size must be odd"
    radius = size // 2
    ax = np.arange(-radius, radius + 1)
    xx, yy = np.meshgrid(ax, ax)
    kernel = np.exp(-(xx**2 + yy**2) / (2 * sigma**2))
    kernel /= kernel.sum()
    return kernel


def convolve(image: np.ndarray, kernel: np.ndarray) -> np.ndarray:
    pad = kernel.shape[0] // 2
    padded = np.pad(image, pad_width=pad, mode="edge")
    output = image.astype(np.float64).copy()
    for y in range(image.shape[0]):
        for x in range(image.shape[1]):
            if y < pad or y >= image.shape[0] - pad or x < pad or x >= image.shape[1] - pad:
                continue
            region = padded[y : y + kernel.shape[0], x : x + kernel.shape[1]]
            output[y, x] = np.sum(region * kernel)
    return output


def convolve_int(image: np.ndarray, kernel: np.ndarray) -> np.ndarray:
    pad = kernel.shape[0] // 2
    padded = np.pad(image, pad_width=pad, mode="edge")
    output = np.zeros_like(image, dtype=np.int32)
    for y in range(image.shape[0]):
        for x in range(image.shape[1]):
            if y < pad or y >= image.shape[0] - pad or x < pad or x >= image.shape[1] - pad:
                continue
            region = padded[y : y + kernel.shape[0], x : x + kernel.shape[1]]
            output[y, x] = int(np.sum(region.astype(np.int32) * kernel))
    return output


def make_coords(array: np.ndarray) -> list[Tuple[int, int]]:
    h, w = array.shape
    return [
        (w // 4, h // 4),
        (w // 2, h // 2),
        (3 * w // 4, 3 * h // 4),
    ]


def log_pixel_samples(label: str, array: np.ndarray, coords: Iterable[Tuple[int, int]]) -> None:
    print(label)
    for (x, y) in coords:
        if 0 <= y < array.shape[0] and 0 <= x < array.shape[1]:
            print(f"  ({x}, {y}) -> {int(array[y, x])}")
    print()


def task3_gaussian():
    img = load_grayscale("image 2.png")
    kernel = gaussian_kernel(size=7, sigma=1.25)
    blurred = convolve(img, kernel)
    blurred = np.clip(blurred, 0, 255).astype(np.uint8)
    coords = make_coords(blurred)
    log_pixel_samples("Task 3 - Gaussian samples", blurred, coords)
    save_array_as_image(blurred, PROCESSED / "gaussian_filtered.png")
    return blurred


def task4_threshold():
    img = load_grayscale("image 3.png")
    hist, bins = np.histogram(img, bins=256, range=(0, 256))
    fig, ax = plt.subplots(figsize=(6, 4))
    ax.bar(bins[:-1], hist, width=1.0, color="#4a90e2")
    ax.set_title("Image 3 Histogram (Grayscale)")
    ax.set_xlabel("Intensity")
    ax.set_ylabel("Frequency")
    fig.tight_layout()
    hist_path = PROCESSED / "image3_histogram.png"
    fig.savefig(hist_path, dpi=150)
    plt.close(fig)
    print(f"Histogram saved to {hist_path}")

    threshold_value = 140
    binary = np.where(img > threshold_value, 255, 0).astype(np.uint8)
    coords = make_coords(binary)
    log_pixel_samples("Task 4 - Threshold samples", binary, coords)
    save_array_as_image(binary, PROCESSED / "thresholded.png")
    return threshold_value, binary


def task5_prewitt():
    img = load_grayscale("image 3.png").astype(np.int32)
    kernel_h = np.array([[-1, 0, 1],
                         [-1, 0, 1],
                         [-1, 0, 1]], dtype=np.int32)
    kernel_v = np.array([[-1, -1, -1],
                         [ 0,  0,  0],
                         [ 1,  1,  1]], dtype=np.int32)

    horiz = convolve_int(img, kernel_h)
    vert = convolve_int(img, kernel_v)

    horiz_abs = np.clip(np.abs(horiz), 0, 255).astype(np.uint8)
    vert_abs = np.clip(np.abs(vert), 0, 255).astype(np.uint8)
    magnitude = np.clip(np.hypot(horiz, vert), 0, 255).astype(np.uint8)

    coords = make_coords(magnitude)
    log_pixel_samples("Task 5 - Prewitt horizontal", horiz_abs, coords)
    log_pixel_samples("Task 5 - Prewitt vertical", vert_abs, coords)
    log_pixel_samples("Task 5 - Prewitt magnitude", magnitude, coords)

    save_array_as_image(horiz_abs, PROCESSED / "prewitt_horizontal.png")
    save_array_as_image(vert_abs, PROCESSED / "prewitt_vertical.png")
    save_array_as_image(magnitude, PROCESSED / "prewitt_magnitude.png")


def main():
    print("Starting Task 3 (Gaussian filter)...")
    task3_gaussian()
    print("Starting Task 4 (Thresholding)...")
    threshold_value, _ = task4_threshold()
    print(f"Threshold used: {threshold_value}")
    print("Starting Task 5 (Prewitt derivatives)...")
    task5_prewitt()
    print("All processing complete.")


if __name__ == "__main__":
    main()
