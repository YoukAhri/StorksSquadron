let serverData = {}; // контейнер для хранения всех данных

fetch("../php/server-status.php")
  .then(res => res.json())
  .then(data => {
    const server = data.find(s => s.name.includes("Dynamic Engine"));
    if (server) {
      serverData = server; // сохраняем весь объект сервера в переменную
      // console.log("Данные сервера:", serverData);

      const adres = serverData.address;
      const players = serverData.mission.blue_slots_used;
      const status = serverData.status;

      console.log(status,adres,players);

      document.getElementById("server-players").textContent = players;

      if (serverData.status === "Running") {
        document.getElementById("server-status").innerHTML = '<div class="status_on">🟢 online</div>';
      } else {
        document.getElementById("server-status").innerHTML = '<div class="status_off">🔴 offline</div>';
      }
    } else {
      console.log("Сервер не найден");
    }
  });