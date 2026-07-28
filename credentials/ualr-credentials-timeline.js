/**
 * UALR credential timeline — facts only.
 * Sources: ualr-academic-progress-raw.md, ualr-academic-record-raw.md
 * (including confirmed conferral notes, 2026-07-28)
 *
 * Display order: chronological by conferral / planned end date.
 */
const ualrCredentialTimeline = [
  {
    id: "ualr-bus-analytics-cp",
    credential: "Business Analytics Certificate of Proficiency",
    status: "completed",
    displayStart: "Jan 2021",
    displayEnd: "Spring 2024",
    marker: "Spring 2024",
    gpa: "4.0 GPA"
  },
  {
    id: "ualr-ba-idst",
    credential: "B.A., Interdisciplinary Studies",
    status: "completed",
    displayStart: "Jan 2021",
    displayEnd: "Fall 2024",
    marker: "Fall 2024",
    gpa: "3.61 GPA"
  },
  {
    id: "ualr-data-science-gc",
    credential: "Graduate Certificate, Data Science",
    status: "completed",
    displayStart: "Jan 2025",
    displayEnd: "Spring 2026",
    marker: "Spring 2026",
    gpa: "3.6 GPA"
  },
  {
    id: "ualr-ms-information-science",
    credential: "M.S., Information Science",
    status: "in-progress",
    displayStart: "Jan 2025",
    displayEnd: "Spring 2027 (planned)",
    marker: "Spring 2027",
    gpa: "3.6 GPA"
  }
];

function createCredentialRow(item) {
  const li = document.createElement("li");
  li.className = `credential-row credential-row--${item.status}`;

  const statusLabel = item.status === "completed" ? "Completed" : "In progress";

  li.innerHTML = `
    <div class="credential-row__marker" aria-hidden="true">
      <span class="credential-row__dot"></span>
    </div>
    <div class="credential-row__body">
      <p class="credential-row__when">${item.marker}</p>
      <h3 class="credential-row__title">${item.credential}</h3>
      <p class="credential-row__meta">
        <span class="credential-row__status">${statusLabel}</span>
        <span class="credential-row__sep" aria-hidden="true">·</span>
        <span>${item.displayStart} – ${item.displayEnd}</span>
        <span class="credential-row__sep" aria-hidden="true">·</span>
        <span>${item.gpa}</span>
      </p>
    </div>
  `;

  return li;
}

function renderUalrCredentialTimeline(container) {
  if (!container) return;

  const list = document.createElement("ol");
  list.className = "credential-timeline-list";
  list.setAttribute("aria-label", "UALR credentials by conferral date");

  ualrCredentialTimeline.forEach((item) => {
    list.appendChild(createCredentialRow(item));
  });

  container.replaceChildren(list);
}

const timelineMount = document.querySelector("[data-ualr-credential-timeline]");
if (timelineMount) {
  renderUalrCredentialTimeline(timelineMount);
}
