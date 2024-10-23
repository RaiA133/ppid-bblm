const carousel = document.getElementById('carousel');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const dotsContainer = document.getElementById('dots');

// Track mouse drag state
let isDragging = false;
let startX;
let scrollLeft;

// Function to update dots based on scroll position
function updateDots() {
  const cardWidth = carousel.querySelector('a').offsetWidth;
  const scrollPosition = Math.round(carousel.scrollLeft / cardWidth);

  // Update active dot
  Array.from(dotsContainer.children).forEach((dot, index) => {
    dot.classList.toggle('bg-gray-800', index === scrollPosition);
    dot.classList.toggle('bg-gray-400', index !== scrollPosition);
  });
}

// Initialize dots
function createDots() {
  const cards = document.querySelectorAll('#card_carousel'); // Select all cards with the specified ID
  const cardCount = cards.length;

  for (let i = 0; i < cardCount; i++) {
    const dot = document.createElement('div');
    dot.classList.add('w-3', 'h-3', 'rounded-full', 'bg-gray-400');
    dotsContainer.appendChild(dot);
  }
  updateDots(); // Set the first dot as active initially
}

createDots();

// Mouse drag functionality
carousel.addEventListener('mousedown', (e) => {
  isDragging = true;
  carousel.classList.add('cursor-grabbing');
  startX = e.pageX - carousel.offsetLeft;
  scrollLeft = carousel.scrollLeft;
});

carousel.addEventListener('mouseleave', () => {
  isDragging = false;
  carousel.classList.remove('cursor-grabbing');
});

carousel.addEventListener('mouseup', () => {
  isDragging = false;
  carousel.classList.remove('cursor-grabbing');
});

carousel.addEventListener('mousemove', (e) => {
  if (!isDragging) return;
  e.preventDefault();
  const x = e.pageX - carousel.offsetLeft;
  const walk = (x - startX) * 2; // Speed of dragging
  carousel.scrollLeft = scrollLeft - walk;
});

// Left and right buttons
nextBtn.addEventListener('click', () => {
  const cardWidth = carousel.querySelector('a').offsetWidth;
  carousel.scrollBy({
    left: cardWidth,
    behavior: 'smooth'
  });
});

prevBtn.addEventListener('click', () => {
  const cardWidth = carousel.querySelector('a').offsetWidth;
  carousel.scrollBy({
    left: -cardWidth,
    behavior: 'smooth'
  });
});

// Update dots on scroll
carousel.addEventListener('scroll', updateDots);

// Optional: Keyboard navigation
document.addEventListener('keydown', (e) => {
  if (e.key === 'ArrowRight') {
    nextBtn.click();
  } else if (e.key === 'ArrowLeft') {
    prevBtn.click();
  }
});
