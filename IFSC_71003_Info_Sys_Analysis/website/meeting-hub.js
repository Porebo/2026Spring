const hubData = {
  series: [
    {
      id: "engineering-weekly",
      title: "Engineering Tech Weekly",
      cadence: "Monday | 11:00 AM | Zoom",
      icon: "calendar",
      meetings: [
        {
          id: "eng-2026-04-20",
          title: "April 20, 2026",
          isoDate: "2026-04-20",
          displayMeta: "Monday, 11:14 AM | Week 17",
          owner: "Lester",
          priority: "High",
          dueDate: "2026-04-24",
          status: "In Progress",
          riskLevel: "Open Risk",
          kind: "summary",
          link: "2026-04-20_EngineeringTech_Weekly.html",
          rightClickNote: true,
        },
        {
          id: "eng-2026-04-13",
          title: "April 13, 2026",
          isoDate: "2026-04-13",
          displayMeta: "Monday, 11:00 AM | Week 16",
          owner: "Team Shared",
          priority: "Medium",
          dueDate: "2026-04-20",
          status: "Completed",
          riskLevel: "Stable",
          kind: "summary",
          link: "2026-04-13_EngineeringTech_Weekly.html",
          rightClickNote: true,
        },
        {
          id: "eng-2026-03-30",
          title: "March 30, 2026",
          isoDate: "2026-03-30",
          displayMeta: "Monday, 11:39 AM | Week 14",
          owner: "Lester",
          priority: "High",
          dueDate: "2026-04-03",
          status: "Escalated",
          riskLevel: "Open Risk",
          kind: "summary",
          link: "2026-03-30_EngineeringTech_Weekly.html",
          rightClickNote: true,
        },
        {
          id: "eng-2026-03-23",
          title: "March 23, 2026",
          isoDate: "2026-03-23",
          displayMeta: "Monday, 11:12 AM | Week 13",
          owner: "Team Shared",
          priority: "Medium",
          dueDate: "2026-03-30",
          status: "Completed",
          riskLevel: "Stable",
          kind: "summary",
          link: "2026-03-23_EngineeringTech_Weekly.html",
          rightClickNote: true,
        },
      ],
    },
    {
      id: "asset-townhall",
      title: "Asset Development Town Halls",
      cadence: "Quarterly | Webinar Format | Diana Morse",
      icon: "users",
      meetings: [
        {
          id: "town-2026-03-27",
          title: "Q1 Town Hall - March 27, 2026",
          isoDate: "2026-03-27",
          displayMeta: "Friday, 8:31 AM | Week 13 | Diana Morse",
          owner: "Leadership",
          priority: "Planned",
          dueDate: "2026-03-27",
          status: "Completed",
          riskLevel: "Stable",
          kind: "townhall",
          link: "2026-03-27_AssetDev_Q1Townhall.html",
          rightClickNote: true,
        },
      ],
    },
    {
      id: "engineering-prep",
      title: "Engineering Tech - Prep Notes",
      cadence: "Pre-meeting preparation and status tracking",
      icon: "doc",
      meetings: [
        {
          id: "prep-2026-04-27",
          title: "April 27, 2026 - Preparation",
          isoDate: "2026-04-27",
          displayMeta: "Monday | Week 18 | Lester",
          owner: "Lester",
          priority: "Planned",
          dueDate: "2026-04-27",
          status: "Prepared",
          riskLevel: "Stable",
          kind: "preparation",
          link: "2026-04-27_Preparation.html",
          rightClickNote: true,
        },
        {
          id: "prep-2026-04-20",
          title: "April 20, 2026 - Preparation",
          isoDate: "2026-04-20",
          displayMeta: "Monday | Week 17 | Lester",
          owner: "Lester",
          priority: "Planned",
          dueDate: "2026-04-20",
          status: "Prepared",
          riskLevel: "Stable",
          kind: "preparation",
          link: "2026-04-20_Preparation.html",
          rightClickNote: true,
        },
        {
          id: "prep-2026-04-13",
          title: "April 13, 2026 - Preparation",
          isoDate: "2026-04-13",
          displayMeta: "Monday | Week 16 | Lester",
          owner: "Lester",
          priority: "Planned",
          dueDate: "2026-04-13",
          status: "Prepared",
          riskLevel: "Stable",
          kind: "preparation",
          link: "2026-04-13_Preparation.html",
          rightClickNote: true,
        },
        {
          id: "prep-2026-04-06",
          title: "April 6, 2026 - Preparation",
          isoDate: "2026-04-06",
          displayMeta: "Monday | Week 15 | Lester",
          owner: "Lester",
          priority: "Planned",
          dueDate: "2026-04-06",
          status: "Prepared",
          riskLevel: "Stable",
          kind: "preparation",
          link: "2026-04-06_Preparation.html",
          rightClickNote: true,
        },
      ],
    },
  ],
};

const hubState = {
  filters: {
    owner: "All",
    priority: "All",
    status: "All",
    kind: "All",
  },
  sortBy: "dateDesc",
  collapsedSeries: new Set(),
};

const icons = {
  calendar:
    '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
  users:
    '<svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
  doc:
    '<svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
};

function initHub() {
  populateOwnerFilter();
  bindUIEvents();
  renderHub();
}

function populateOwnerFilter() {
  const ownerFilter = document.getElementById("ownerFilter");
  const owners = Array.from(
    new Set(hubData.series.flatMap((series) => series.meetings.map((meeting) => meeting.owner)))
  ).sort();

  owners.forEach((owner) => {
    const option = document.createElement("option");
    option.value = owner;
    option.textContent = owner;
    ownerFilter.appendChild(option);
  });
}

function bindUIEvents() {
  document.getElementById("ownerFilter").addEventListener("change", (event) => {
    hubState.filters.owner = event.target.value;
    renderHub();
  });

  document.getElementById("priorityFilter").addEventListener("change", (event) => {
    hubState.filters.priority = event.target.value;
    renderHub();
  });

  document.getElementById("statusFilter").addEventListener("change", (event) => {
    hubState.filters.status = event.target.value;
    renderHub();
  });

  document.getElementById("kindFilter").addEventListener("change", (event) => {
    hubState.filters.kind = event.target.value;
    renderHub();
  });

  document.getElementById("sortFilter").addEventListener("change", (event) => {
    hubState.sortBy = event.target.value;
    renderHub();
  });

  document.getElementById("clearFiltersBtn").addEventListener("click", () => {
    hubState.filters = { owner: "All", priority: "All", status: "All", kind: "All" };
    hubState.sortBy = "dateDesc";

    document.getElementById("ownerFilter").value = "All";
    document.getElementById("priorityFilter").value = "All";
    document.getElementById("statusFilter").value = "All";
    document.getElementById("kindFilter").value = "All";
    document.getElementById("sortFilter").value = "dateDesc";

    renderHub();
  });
}

function renderHub() {
  const seriesContainer = document.getElementById("seriesContainer");
  seriesContainer.innerHTML = "";

  const visibleMeetings = [];

  hubData.series.forEach((series) => {
    const filteredMeetings = applySort(applyFilters(series.meetings, hubState.filters), hubState.sortBy);
    if (filteredMeetings.length === 0) {
      return;
    }

    visibleMeetings.push(...filteredMeetings);
    seriesContainer.appendChild(renderSeries(series, filteredMeetings));
  });

  if (visibleMeetings.length === 0) {
    const empty = document.createElement("div");
    empty.className = "empty-state";
    empty.textContent = "No meeting records match the current filter selection.";
    seriesContainer.appendChild(empty);
  }

  renderSummary(visibleMeetings);
}

function renderSeries(series, meetings) {
  const section = document.createElement("section");

  const label = document.createElement("p");
  label.className = "section-label";
  label.textContent = series.id === "engineering-prep" ? "Meeting Preparation" : "Meeting Series";

  const card = document.createElement("div");
  card.className = "series-card";
  if (hubState.collapsedSeries.has(series.id)) {
    card.classList.add("is-collapsed");
  }

  const header = document.createElement("div");
  header.className = "series-header";

  const iconWrap = document.createElement("div");
  iconWrap.className = "series-icon";
  iconWrap.setAttribute("aria-hidden", "true");
  iconWrap.innerHTML = icons[series.icon] || icons.calendar;

  const meta = document.createElement("div");
  meta.className = "series-meta";
  const title = document.createElement("p");
  title.className = "series-title";
  title.textContent = series.title;
  const cadence = document.createElement("p");
  cadence.className = "series-cadence";
  cadence.textContent = series.cadence;
  meta.appendChild(title);
  meta.appendChild(cadence);

  const count = document.createElement("div");
  count.className = "meeting-count";
  const noun = meetings.length === 1 ? "meeting" : "meetings";
  count.textContent = `${meetings.length} ${noun}`;

  const toggleBtn = document.createElement("button");
  toggleBtn.className = "series-toggle";
  toggleBtn.type = "button";
  toggleBtn.textContent = hubState.collapsedSeries.has(series.id) ? "Show" : "Hide";
  toggleBtn.addEventListener("click", () => {
    if (hubState.collapsedSeries.has(series.id)) {
      hubState.collapsedSeries.delete(series.id);
    } else {
      hubState.collapsedSeries.add(series.id);
    }
    renderHub();
  });

  header.appendChild(iconWrap);
  header.appendChild(meta);
  header.appendChild(count);
  header.appendChild(toggleBtn);

  const list = document.createElement("ul");
  list.className = "meeting-list";
  meetings.forEach((meeting) => {
    list.appendChild(renderMeetingRow(meeting));
  });

  card.appendChild(header);
  card.appendChild(list);
  section.appendChild(label);
  section.appendChild(card);
  return section;
}

function renderMeetingRow(meeting) {
  const li = document.createElement("li");
  const link = document.createElement("a");
  link.className = "meeting-link";
  link.href = meeting.link;
  link.rel = "noopener";
  link.target = meeting.link.startsWith("http") ? "_top" : "_self";
  link.setAttribute("aria-label", `${meeting.title} ${meeting.kind}`);

  const dateBlock = document.createElement("div");
  dateBlock.className = "meeting-date-block";
  const parsed = new Date(`${meeting.isoDate}T00:00:00`);
  const month = parsed.toLocaleString("en-US", { month: "short" });
  const day = `${parsed.getDate()}`.padStart(2, "0");
  const year = `${parsed.getFullYear()}`;
  dateBlock.innerHTML = `<span class="month">${month}</span><span class="day">${day}</span><span class="year">${year}</span>`;

  const meta = document.createElement("div");
  meta.className = "meeting-meta";

  const title = document.createElement("span");
  title.className = "meeting-title";
  title.textContent = meeting.title;

  const detail = document.createElement("span");
  detail.className = "meeting-detail";
  detail.textContent = meeting.displayMeta;

  const tags = document.createElement("div");
  tags.className = "tag-row";
  tags.innerHTML = `
    <span class="tag tag-priority">Priority: ${meeting.priority}</span>
    <span class="tag tag-owner">Owner: ${meeting.owner}</span>
    <span class="tag tag-due">Due: ${formatReadableDate(meeting.dueDate)}</span>
    <span class="tag tag-status">Status: ${meeting.status}</span>
  `;

  meta.appendChild(title);
  meta.appendChild(detail);
  meta.appendChild(tags);

  const arrow = document.createElement("span");
  arrow.className = "meeting-arrow";
  arrow.innerHTML = "&#8250;";

  link.appendChild(dateBlock);
  link.appendChild(meta);
  link.appendChild(arrow);
  li.appendChild(link);
  return li;
}

function applyFilters(meetings, filters) {
  return meetings.filter((meeting) => {
    const ownerMatch = filters.owner === "All" || meeting.owner === filters.owner;
    const priorityMatch = filters.priority === "All" || meeting.priority === filters.priority;
    const statusMatch = filters.status === "All" || meeting.status === filters.status;
    const kindMatch = filters.kind === "All" || meeting.kind === filters.kind;
    return ownerMatch && priorityMatch && statusMatch && kindMatch;
  });
}

function applySort(meetings, sortBy) {
  const copied = [...meetings];
  copied.sort((a, b) => {
    if (sortBy === "dateAsc") {
      return a.isoDate.localeCompare(b.isoDate);
    }
    if (sortBy === "priorityDesc") {
      const rank = { High: 3, Medium: 2, Planned: 1 };
      const rankDiff = (rank[b.priority] || 0) - (rank[a.priority] || 0);
      if (rankDiff !== 0) {
        return rankDiff;
      }
      return b.isoDate.localeCompare(a.isoDate);
    }
    return b.isoDate.localeCompare(a.isoDate);
  });
  return copied;
}

function renderSummary(meetings) {
  const completedCount = meetings.filter((meeting) => meeting.status === "Completed").length;
  const preparedCount = meetings.filter((meeting) => meeting.status === "Prepared").length;
  const escalatedCount = meetings.filter((meeting) => meeting.status === "Escalated").length;
  const openRiskCount = meetings.filter((meeting) => meeting.riskLevel === "Open Risk").length;
  const highPriorityCount = meetings.filter((meeting) => meeting.priority === "High").length;

  const ownerCounts = {};
  meetings.forEach((meeting) => {
    ownerCounts[meeting.owner] = (ownerCounts[meeting.owner] || 0) + 1;
  });

  const topOwner = Object.entries(ownerCounts).sort((a, b) => b[1] - a[1])[0];
  const ownerFocus = topOwner ? `${topOwner[0]} (${topOwner[1]})` : "none";

  const impactText = escalatedCount > 0 || openRiskCount > 0 ? "watch list" : "stable";
  const escalationLoad = escalatedCount > 1 ? "high" : escalatedCount === 1 ? "moderate" : "low";

  document.getElementById("outcomeList").innerHTML = `
    <li>Completed actions: ${completedCount + preparedCount}</li>
    <li>Open risks: ${openRiskCount}</li>
    <li>Escalations to manager: ${escalatedCount}</li>
    <li>Programmed project impact: ${impactText}</li>
  `;

  document.getElementById("managerList").innerHTML = `
    <li>Visible meetings after filters: ${meetings.length}.</li>
    <li>High-priority items currently visible: ${highPriorityCount}.</li>
    <li>Owner focus: ${ownerFocus}.</li>
    <li>Escalation load: ${escalationLoad}.</li>
  `;
}

function formatReadableDate(isoDate) {
  const parsed = new Date(`${isoDate}T00:00:00`);
  return parsed.toLocaleDateString("en-US", {
    month: "short",
    day: "numeric",
    year: "numeric",
  });
}

initHub();

