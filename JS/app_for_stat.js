const stats = {
  online: { value: 12, suffix: "/32" },
  ping: { value: 58, suffix: " ms" },
  avgOnline: { value: 28, suffix: "" },
  maxOnline: { value: 32, suffix: "" },
  uniqueWeek: { value: 158, suffix: "" },
  totalHours: { value: 2740, suffix: " ч" },
  totalSorties: { value: 1213, suffix: "" },
  monthUnique: { value: 121, suffix: "" },
  monthAvg: { value: 12, suffix: "" },
};

const players = [
  { name: "Stork One", hours: "184 ч" },
  { name: "Vega", hours: "173 ч" },
  { name: "Falcon-12", hours: "161 ч" },
  { name: "Maverick", hours: "149 ч" },
  { name: "Redline", hours: "136 ч" },
];

const activity = [
  { day: "Пн", online: 22 },
  { day: "Вт", online: 27 },
  { day: "Ср", online: 24 },
  { day: "Чт", online: 31 },
  { day: "Пт", online: 32 },
  { day: "Сб", online: 29 },
  { day: "Вс", online: 27 },
];

const playerStats = {
  serverHours: { value: 152, suffix: " ч" },
  kills: { value: 243, suffix: "" },
  sorties: { value: 78, suffix: "" },
  rating: { value: 12, suffix: "", prefix: "#" },
  kd: { value: 3.02, suffix: "", decimals: 2 },
  groundTargets: { value: 1213, suffix: "" },
  airTargets: { value: 67, suffix: "" },
  avgOnline: { value: 12, suffix: "" },
};

const playerActivity = [
  { label: "28 Апр", value: 41 },
  { label: "", value: 24 },
  { label: "5 Май", value: 30 },
  { label: "", value: 14 },
  { label: "12 Май", value: 8 },
  { label: "", value: 46 },
  { label: "19 Май", value: 24 },
];

const modules = [
  { name: "F/A-18C Hornet", hours: 68, short: "F18" },
  { name: "F-16C", hours: 63, short: "F16" },
  { name: "A-10C II", hours: 31, short: "A10" },
  { name: "F-4E Phantom", hours: 23, short: "F4" },
  { name: "MiG-29 9-12", hours: 12, short: "M29" },
];

const formatNumber = (value) => value.toLocaleString("ru-RU");

function animateCounter(element, target, suffix) {
  const duration = 1300;
  const start = performance.now();
  const ease = (t) => 1 - Math.pow(1 - t, 3);

  function tick(now) {
    const progress = Math.min(1, (now - start) / duration);
    const current = Math.round(target * ease(progress));
    element.textContent = `${formatNumber(current)}${suffix}`;

    if (progress < 1) {
      requestAnimationFrame(tick);
    }
  }

  requestAnimationFrame(tick);
}

function animateValue(element, item) {
  const duration = 1300;
  const start = performance.now();
  const ease = (t) => 1 - Math.pow(1 - t, 3);
  const prefix = item.prefix || "";
  const suffix = item.suffix || "";
  const decimals = item.decimals || 0;

  function tick(now) {
    const progress = Math.min(1, (now - start) / duration);
    const raw = item.value * ease(progress);
    const current = decimals > 0 ? raw.toFixed(decimals) : formatNumber(Math.round(raw));
    element.textContent = `${prefix}${current}${suffix}`;

    if (progress < 1) {
      requestAnimationFrame(tick);
    }
  }

  requestAnimationFrame(tick);
}

function startCounters() {
  document.querySelectorAll("[data-counter]").forEach((element) => {
    const key = element.dataset.counter;
    const item = stats[key];

    if (item) {
      animateCounter(element, item.value, item.suffix);
    }
  });
}

function startPlayerCounters() {
  document.querySelectorAll("[data-player-counter]").forEach((element) => {
    const key = element.dataset.playerCounter;
    const item = playerStats[key];

    if (item) {
      animateValue(element, item);
    }
  });
}

function startUptime() {
  const element = document.querySelector("[data-uptime]");
  let seconds = 11033;

  function render() {
    const hours = Math.floor(seconds / 3600);
    const minutes = Math.floor((seconds % 3600) / 60);
    const secs = seconds % 60;
    element.textContent = [hours, minutes, secs]
      .map((part) => String(part).padStart(2, "0"))
      .join(":");
    seconds += 1;
  }

  if (element) {
    render();
    setInterval(render, 1000);
  }
}

function renderPlayers() {
  const root = document.querySelector("[data-players]");

  if (!root) return;

  root.innerHTML = players
    .map((player, index) => `
      <div class="players-table__row" role="row">
        <span role="cell">${index + 1}</span>
        <span class="players-table__name" role="cell" title="${player.name}">${player.name}</span>
        <span class="players-table__time" role="cell">${player.hours}</span>
      </div>
    `)
    .join("");
}

function renderChart() {
  const root = document.querySelector("[data-chart]");

  if (!root) return;

  root.innerHTML = activity
    .map((item, index) => {
      const height = Math.round((item.online / 50) * 100);
      return `
        <div
          class="chart__bar"
          style="--value: ${height}%; animation-delay: ${index * 80}ms"
          title="${item.day}: ${item.online} игроков"
          aria-label="${item.day}: ${item.online} игроков"
        >
          <span>${item.day}</span>
        </div>
      `;
    })
    .join("");
}

function renderPlayerChart() {
  const root = document.querySelector("[data-player-chart]");

  if (!root) return;

  root.innerHTML = playerActivity
    .map((item, index) => {
      const height = Math.round((item.value / 50) * 100);
      return `
        <div
          class="chart__bar"
          style="--value: ${height}%; animation-delay: ${index * 80}ms"
          title="${item.label || `Неделя ${index + 1}`}: ${item.value} часов"
          aria-label="${item.label || `Неделя ${index + 1}`}: ${item.value} часов"
        >
          <span>${item.label}</span>
        </div>
      `;
    })
    .join("");
}

function renderModules() {
  const root = document.querySelector("[data-modules]");

  if (!root) return;

  const maxHours = Math.max(...modules.map((module) => module.hours));
  root.innerHTML = modules
    .map((module, index) => {
      const width = Math.round((module.hours / maxHours) * 100);
      return `
        <div class="module-item">
          <span class="module-item__thumb" aria-hidden="true">${module.short}</span>
          <div>
            <div class="module-item__top">
              <span>${module.name}</span>
              <span class="module-item__hours">${module.hours} ч</span>
            </div>
            <div class="module-item__track">
              <div class="module-item__bar" style="--value: ${width}%; animation-delay: ${200 + index * 90}ms"></div>
            </div>
          </div>
        </div>
      `;
    })
    .join("");
}

function bindNavigation() {
  const nav = document.querySelector(".nav");
  const toggle = document.querySelector(".nav__toggle");

  if (!nav || !toggle) return;

  toggle.addEventListener("click", () => {
    const isOpen = nav.classList.toggle("is-open");
    toggle.setAttribute("aria-expanded", String(isOpen));
  });
}

renderPlayers();
renderChart();
renderPlayerChart();
renderModules();
startCounters();
startPlayerCounters();
startUptime();
bindNavigation();
