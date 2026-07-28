/**
 * UALR credential timeline — facts only.
 * Sources: ualr-academic-progress-raw.md, ualr-academic-record-raw.md
 * (including confirmed conferral notes, 2026-07-28)
 */
const ualrCredentialTimeline = [
  {
    id: "ualr-bus-analytics-cp",
    credential: "Business Analytics Certificate of Proficiency",
    institution: "University of Arkansas at Little Rock",
    status: "completed",
    start: "2021-01",
    end: "2024-05",
    displayStart: "Jan 2021",
    displayEnd: "May 2024",
    gpa: "4.00 program GPA"
  },
  {
    id: "ualr-ba-idst",
    credential: "B.A., Interdisciplinary Studies",
    institution: "University of Arkansas at Little Rock",
    status: "completed",
    start: "2021-01",
    end: "2024-12",
    displayStart: "Jan 2021",
    displayEnd: "Fall 2024",
    gpa: "3.61 cumulative / 4.00 program GPA"
  },
  {
    id: "ualr-data-science-gc",
    credential: "Graduate Certificate, Data Science",
    institution: "University of Arkansas at Little Rock",
    status: "completed",
    start: "2025-01",
    end: "2026-05",
    displayStart: "Jan 2025",
    displayEnd: "May 2026",
    gpa: "3.60 cumulative GPA"
  },
  {
    id: "ualr-ms-information-science",
    credential: "M.S., Information Science",
    institution: "University of Arkansas at Little Rock",
    status: "in-progress",
    start: "2025-01",
    end: "2027-05",
    displayStart: "Jan 2025",
    displayEnd: "May 2027 (planned)",
    gpa: "3.60 cumulative GPA"
  }
];

const TIMELINE_RANGE = { startYear: 2021, endYear: 2027 };

function parseYearMonth(value) {
  const [year, month] = value.split("-").map(Number);
  return { year, month: month || 1 };
}

function monthOffset(year, month) {
  return (year - TIMELINE_RANGE.startYear) * 12 + (month - 1);
}

function createCredentialNode(item, lane) {
  const start = parseYearMonth(item.start);
  const end = parseYearMonth(item.end);
  const rangeStart = monthOffset(TIMELINE_RANGE.startYear, 1);
  const rangeEnd = monthOffset(TIMELINE_RANGE.endYear, 12);
  const totalMonths = rangeEnd - rangeStart + 1;

  const left = ((monthOffset(start.year, start.month) - rangeStart) / totalMonths) * 100;
  const width = Math.max(
    ((monthOffset(end.year, end.month) - monthOffset(start.year, start.month) + 1) / totalMonths) * 100,
    4
  );

  const article = document.createElement("article");
  article.className = `credential-span credential-span--${item.status}`;
  article.style.left = `${left}%`;
  article.style.width = `${width}%`;
  article.style.top = `${lane * 132}px`;
  article.setAttribute("role", "listitem");
  article.setAttribute("aria-label", `${item.credential}, ${item.displayStart} to ${item.displayEnd}`);

  const statusLabel = item.status === "completed" ? "Completed" : "In progress";

  article.innerHTML = `
    <div class="credential-span__bar" aria-hidden="true"></div>
    <div class="credential-span__card">
      <p class="credential-span__status">${statusLabel}</p>
      <h3 class="credential-span__title">${item.credential}</h3>
      <p class="credential-span__institution">${item.institution}</p>
      <p class="credential-span__dates">${item.displayStart} – ${item.displayEnd}</p>
      <p class="credential-span__gpa">${item.gpa}</p>
    </div>
  `;

  return article;
}

function renderYearAxis(container) {
  const axis = document.createElement("div");
  axis.className = "credential-timeline__years";
  axis.setAttribute("aria-hidden", "true");

  for (let year = TIMELINE_RANGE.startYear; year <= TIMELINE_RANGE.endYear; year += 1) {
    const tick = document.createElement("span");
    tick.className = "credential-timeline__year";
    tick.style.left = `${((year - TIMELINE_RANGE.startYear) / (TIMELINE_RANGE.endYear - TIMELINE_RANGE.startYear)) * 100}%`;
    tick.textContent = String(year);
    axis.appendChild(tick);
  }

  container.appendChild(axis);
}

function renderUalrCredentialTimeline(container) {
  if (!container) return;

  container.replaceChildren();
  container.setAttribute("role", "list");
  container.setAttribute("aria-label", "UALR credentials timeline");

  const track = document.createElement("div");
  track.className = "credential-timeline__track";

  const line = document.createElement("div");
  line.className = "credential-timeline__line";
  line.setAttribute("aria-hidden", "true");
  track.appendChild(line);

  const spans = document.createElement("div");
  spans.className = "credential-timeline__spans";

  ualrCredentialTimeline.forEach((item, index) => {
    spans.appendChild(createCredentialNode(item, index));
  });

  track.appendChild(spans);
  container.appendChild(track);
  renderYearAxis(container);
}

const timelineMount = document.querySelector("[data-ualr-credential-timeline]");
if (timelineMount) {
  renderUalrCredentialTimeline(timelineMount);
}
