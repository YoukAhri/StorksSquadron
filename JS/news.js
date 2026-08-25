    const bg = document.getElementById("bg");
    const maxScale = 1.6;
    const minScale = 1;
    const triggerHeight = 500; // до какого скролла масштаб растёт
    let ticking = false;

    function updateScale() {
      const scrollY = window.scrollY;
      const clamped = Math.min(triggerHeight, Math.max(0, scrollY));
      const factor = clamped / triggerHeight; // 0..1
      const scale = minScale + factor * (maxScale - minScale);
      bg.style.transform = 'scale(' + scale.toFixed(3) + ')';
      ticking = false;
    }

    window.addEventListener("scroll", () => {
      if (!ticking) {
        window.requestAnimationFrame(updateScale);
        ticking = true;
      }
    }, { passive: true });




const slider = document.querySelector(".news-slider");

// стрелки
const leftArrow = document.querySelector(".news-arrow.left");
const rightArrow = document.querySelector(".news-arrow.right");

leftArrow.addEventListener("click", () => {
  slider.scrollBy({ left: -300, behavior: "smooth" });
});

rightArrow.addEventListener("click", () => {
  slider.scrollBy({ left: 300, behavior: "smooth" });
});


// 👇 ПЕРЕТАСКИВАНИЕ (мышка)
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener("mousedown", (e) => {
  isDown = true;
  startX = e.pageX;
  scrollLeft = slider.scrollLeft;
});

slider.addEventListener("mouseup", () => isDown = false);
slider.addEventListener("mouseleave", () => isDown = false);

slider.addEventListener("mousemove", (e) => {
  if (!isDown) return;

  e.preventDefault(); // 👈 ВАЖНО (убирает выделение)
  
  const walk = (e.pageX - startX) * 1.2;
  slider.scrollLeft = scrollLeft - walk;
});


// 👇 ВОТ ЭТО — часть 2 (тач)
slider.addEventListener("touchstart", (e) => {
  startX = e.touches[0].pageX;
  scrollLeft = slider.scrollLeft;
});

slider.addEventListener("touchmove", (e) => {
  if (e.cancelable) e.preventDefault(); // 👈 фикс дергания

  const x = e.touches[0].pageX;
  const walk = (x - startX) * 1.2; // чуть мягче
  slider.scrollLeft = scrollLeft - walk;
});