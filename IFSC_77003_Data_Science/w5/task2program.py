"""Black-and-white conversion script for Task 2.

Loads the selected color image, applies the (R+G+B)/3 average per pixel,
replicates the result across RGB channels, and saves the output.
"""
from __future__ import annotations

import sys
from pathlib import Path

import numpy as np
from PIL import Image

BASE_DIR = Path(__file__).parent
ORIGINAL_IMG = BASE_DIR / "images" / "originals" / "image 1.jpg"
OUTPUT_DIR = BASE_DIR / "images" / "processed"
OUTPUT_IMG = OUTPUT_DIR / "black_and_white.png"


def sample_pixels(array, coords, label):
    """Print representative pixel values to document each processing step."""
    print(f"{label}:")
    for x, y in coords:
        if y >= array.shape[0] or x >= array.shape[1]:
            continue
        value = array[y, x]
        if value.ndim == 0:
            payload = int(value)
        elif value.ndim == 1:
            payload = [int(v) for v in value]
        else:
            payload = value.tolist()
        print(f"  ({x}, {y}) -> {payload}")
    print()


def convert_to_black_and_white() -> None:
    if not ORIGINAL_IMG.exists():
        raise FileNotFoundError(f"Input image not found: {ORIGINAL_IMG}")

    OUTPUT_DIR.mkdir(parents=True, exist_ok=True)

    with Image.open(ORIGINAL_IMG) as img:
        rgb = img.convert("RGB")
        rgb_array = np.asarray(rgb, dtype=np.uint16)

    h, w = rgb_array.shape[:2]
    sample_coords = [
        (0, 0),
        (w // 2, h // 2),
        (w - 1, h - 1),
    ]
    sample_pixels(rgb_array, sample_coords, "Sample RGB pixels")

    avg = rgb_array.mean(axis=2, keepdims=True)
    sample_pixels(avg, sample_coords, "Sample averaged intensities")

    bw_array = np.repeat(avg.astype(np.uint8), 3, axis=2)
    sample_pixels(bw_array, sample_coords, "Sample replicated RGB grayscale pixels")

    bw_image = Image.fromarray(bw_array, mode="RGB")
    bw_image.save(OUTPUT_IMG)

    print("Black-and-white conversion complete.")
    print(f"Input : {ORIGINAL_IMG} ({rgb.width}x{rgb.height})")
    print(f"Output: {OUTPUT_IMG} ({bw_image.width}x{bw_image.height})")


def main() -> int:
    try:
        convert_to_black_and_white()
    except Exception as exc:  # pragma: no cover - runtime safeguard
        print(f"Error: {exc}", file=sys.stderr)
        return 1
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
