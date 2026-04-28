(function () {
  const STORAGE_KEY = "meetingNotesWidget.v1";
  const API_URL = "meetingNotesApi.php";

  const defaultMeetings = [
    { id: "2026-03-23", label: "2026-03-23 Engineering Tech Weekly" },
    { id: "2026-03-27", label: "2026-03-27 Asset Dev Q1 Town Hall" },
    { id: "2026-03-30", label: "2026-03-30 Engineering Tech Weekly" },
    { id: "2026-04-06", label: "2026-04-06 Engineering Tech Weekly" },
    { id: "2026-04-06-prep", label: "2026-04-06 Preparation" },
    { id: "2026-04-09", label: "2026-04-09 DA Weekly" },
    { id: "2026-04-13", label: "2026-04-13 Engineering Tech Weekly" },
    { id: "2026-04-13-prep", label: "2026-04-13 Preparation" },
    { id: "2026-04-16", label: "2026-04-16 DA Weekly" },
    { id: "2026-04-20", label: "2026-04-20 Engineering Tech Weekly" },
    { id: "2026-04-20-prep", label: "2026-04-20 Preparation" },
    { id: "2026-04-27-prep", label: "2026-04-27 Preparation" }
  ];

  const current = inferCurrentMeeting();
  const allMeetings = mergeCurrentMeeting(defaultMeetings, current);

  const root = document.createElement("aside");
  root.className = "mnw-panel";
  root.hidden = true;

  const toggle = document.createElement("button");
  toggle.type = "button";
  toggle.className = "mnw-toggle";
  toggle.textContent = "Meeting Notes";

  root.innerHTML = [
    '<h3 class="mnw-title">Reusable Meeting Notes</h3>',
    '<div class="mnw-row">',
    '  <label class="mnw-label" for="mnw-meeting">Meeting</label>',
    '  <select id="mnw-meeting" class="mnw-select"></select>',
    '</div>',
    '<div class="mnw-row">',
    '  <label class="mnw-label" for="mnw-tag">Tag (optional)</label>',
    '  <input id="mnw-tag" class="mnw-input" type="text" maxlength="40" placeholder="Action, Follow-up, Risk">',
    '</div>',
    '<div class="mnw-row">',
    '  <label class="mnw-label" for="mnw-note">Comments</label>',
    '  <textarea id="mnw-note" class="mnw-textarea" placeholder="Write your meeting note..."></textarea>',
    '</div>',
    '<div class="mnw-actions">',
    '  <button type="button" id="mnw-save" class="mnw-btn">Save Note</button>',
    '  <button type="button" id="mnw-clear" class="mnw-btn">Clear Draft</button>',
    '  <span id="mnw-status" class="mnw-status"></span>',
    '</div>',
    '<div class="mnw-row">',
    '  <label class="mnw-label">Saved Notes for Selected Meeting</label>',
    '  <ul id="mnw-list" class="mnw-list"></ul>',
    '</div>'
  ].join("");

  document.body.appendChild(toggle);
  document.body.appendChild(root);

  const els = {
    meeting: root.querySelector("#mnw-meeting"),
    tag: root.querySelector("#mnw-tag"),
    note: root.querySelector("#mnw-note"),
    save: root.querySelector("#mnw-save"),
    clear: root.querySelector("#mnw-clear"),
    list: root.querySelector("#mnw-list"),
    status: root.querySelector("#mnw-status")
  };

  let autoTimer = null;
  let storeMode = "php";
  let dbState = { notes: [], drafts: {} };

  renderMeetingOptions();
  els.meeting.value = current.id;
  void initializeWidget();

  toggle.addEventListener("click", function () {
    root.hidden = !root.hidden;
  });

  els.meeting.addEventListener("change", function () {
    renderSavedNotes();
    loadDraft();
    setStatus("");
  });

  els.note.addEventListener("input", queueDraftSave);
  els.tag.addEventListener("input", queueDraftSave);

  els.save.addEventListener("click", async function () {
    const noteText = (els.note.value || "").trim();
    const tagText = (els.tag.value || "").trim();

    if (!noteText) {
      setStatus("Add comments before saving.");
      return;
    }

    dbState.notes.push({
      id: makeId(),
      meetingId: els.meeting.value,
      meetingLabel: selectedMeetingLabel(),
      tag: tagText,
      text: noteText,
      createdAt: new Date().toISOString()
    });
    dbState.drafts[els.meeting.value] = { tag: "", text: "" };
    await persistDB();

    els.note.value = "";
    els.tag.value = "";
    renderSavedNotes();
    setStatus("Saved.");
  });

  els.clear.addEventListener("click", async function () {
    els.note.value = "";
    els.tag.value = "";
    await saveDraft();
    setStatus("Draft cleared.");
  });

  async function initializeWidget() {
    const serverDB = await fetchServerDB();
    if (serverDB) {
      dbState = serverDB;
      storeMode = "php";
    } else {
      dbState = readLocalDB();
      storeMode = "local";
      setStatus("Using local storage fallback.");
    }
    renderSavedNotes();
    loadDraft();
  }

  function renderMeetingOptions() {
    els.meeting.innerHTML = "";
    allMeetings.forEach(function (m) {
      const option = document.createElement("option");
      option.value = m.id;
      option.textContent = m.label;
      els.meeting.appendChild(option);
    });
  }

  function renderSavedNotes() {
    const meetingId = els.meeting.value;
    const notes = dbState.notes
      .filter(function (n) { return n.meetingId === meetingId; })
      .sort(function (a, b) { return b.createdAt.localeCompare(a.createdAt); });

    els.list.innerHTML = "";
    if (notes.length === 0) {
      const empty = document.createElement("li");
      empty.className = "mnw-empty";
      empty.textContent = "No notes saved for this meeting yet.";
      els.list.appendChild(empty);
      return;
    }

    notes.forEach(function (n) {
      const item = document.createElement("li");
      item.className = "mnw-item";

      const head = document.createElement("div");
      head.className = "mnw-item-head";

      const left = document.createElement("span");
      left.textContent = formatTime(n.createdAt) + (n.tag ? " | " + n.tag : "");

      const del = document.createElement("button");
      del.type = "button";
      del.className = "mnw-item-del";
      del.textContent = "Delete";
      del.addEventListener("click", function () {
        void deleteNote(n.id);
      });

      head.appendChild(left);
      head.appendChild(del);

      const text = document.createElement("p");
      text.className = "mnw-item-text";
      text.textContent = n.text;

      item.appendChild(head);
      item.appendChild(text);
      els.list.appendChild(item);
    });
  }

  function queueDraftSave() {
    if (autoTimer) {
      clearTimeout(autoTimer);
    }
    autoTimer = setTimeout(async function () {
      await saveDraft();
      setStatus("Draft saved.");
    }, 500);
  }

  async function saveDraft() {
    dbState.drafts[els.meeting.value] = {
      tag: els.tag.value || "",
      text: els.note.value || ""
    };
    await persistDB();
  }

  function loadDraft() {
    const draft = dbState.drafts[els.meeting.value] || { tag: "", text: "" };
    els.tag.value = draft.tag;
    els.note.value = draft.text;
  }

  function setStatus(msg) {
    els.status.textContent = msg;
  }

  function selectedMeetingLabel() {
    const opt = els.meeting.options[els.meeting.selectedIndex];
    return opt ? opt.textContent : els.meeting.value;
  }

  function normalizeDB(parsed) {
    return {
      notes: Array.isArray(parsed.notes) ? parsed.notes : [],
      drafts: parsed.drafts && typeof parsed.drafts === "object" ? parsed.drafts : {}
    };
  }

  function readLocalDB() {
    try {
      const parsed = JSON.parse(localStorage.getItem(STORAGE_KEY) || "{}");
      return normalizeDB(parsed);
    } catch (err) {
      return { notes: [], drafts: {} };
    }
  }

  function writeLocalDB(db) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(db));
  }

  async function fetchServerDB() {
    try {
      const res = await fetch(API_URL, {
        method: "GET",
        headers: { "Accept": "application/json" },
        cache: "no-store"
      });
      if (!res.ok) {
        return null;
      }
      const payload = await res.json();
      if (!payload || payload.ok !== true || !payload.db) {
        return null;
      }
      return normalizeDB(payload.db);
    } catch (err) {
      return null;
    }
  }

  async function persistDB() {
    if (storeMode === "local") {
      writeLocalDB(dbState);
      return;
    }

    try {
      const res = await fetch(API_URL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify({ action: "sync", db: dbState })
      });
      if (!res.ok) {
        throw new Error("Unable to save");
      }
      const payload = await res.json();
      if (!payload || payload.ok !== true || !payload.db) {
        throw new Error("Bad response");
      }
      dbState = normalizeDB(payload.db);
    } catch (err) {
      storeMode = "local";
      writeLocalDB(dbState);
      setStatus("Server unavailable. Switched to local storage.");
    }
  }

  async function deleteNote(noteId) {
    dbState.notes = dbState.notes.filter(function (x) { return x.id !== noteId; });
    await persistDB();
    renderSavedNotes();
    setStatus("Note deleted.");
  }

  function makeId() {
    return "note-" + Date.now() + "-" + Math.floor(Math.random() * 100000);
  }

  function formatTime(iso) {
    try {
      const d = new Date(iso);
      return d.toLocaleString("en-US", {
        month: "short",
        day: "numeric",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit"
      });
    } catch (err) {
      return iso;
    }
  }

  function inferCurrentMeeting() {
    const file = (location.pathname.split("/").pop() || "").replace(/\.html?$/i, "");
    const dateMatch = file.match(/(\d{4}-\d{2}-\d{2})/);
    const dateId = dateMatch ? dateMatch[1] : "hub";
    const isPrep = /preparation/i.test(file) || /Preparation/i.test(document.title);
    const id = isPrep ? dateId + "-prep" : dateId;
    const label = document.title ? (dateMatch ? dateMatch[1] + " " + document.title.replace(/\s*[-|].*$/, "") : document.title) : id;
    return { id: id, label: label };
  }

  function mergeCurrentMeeting(list, currentMeeting) {
    const cloned = list.slice();
    const exists = cloned.some(function (m) { return m.id === currentMeeting.id; });
    if (!exists) {
      cloned.unshift(currentMeeting);
    }
    return cloned;
  }
})();
