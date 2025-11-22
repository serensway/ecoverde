// ECO VERDE YVYPORÃ - JAVASCRIPT

// CONTADOR DE ÁRBOLES
let treeCount = 0;
const counterElement = document.getElementById('treeCounter');
const demoButton = document.getElementById('demoInc');

function updateCounter() {
  if (counterElement) {
    counterElement.textContent = treeCount.toLocaleString('es-PY');
  }
}

if (demoButton) {
  demoButton.addEventListener('click', () => {
    treeCount += Math.floor(Math.random() * 10) + 1;
    updateCounter();
  });
}

// MENÚ LATERAL
const menuToggle = document.getElementById('menuToggle');
const closeMenu = document.getElementById('closeMenu');
const sideMenu = document.getElementById('sideMenu');

function openMenu() {
  if (sideMenu) {
    sideMenu.classList.add('active');
    sideMenu.setAttribute('aria-hidden', 'false');
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
  }
}

function closeMenuFn() {
  if (sideMenu) {
    sideMenu.classList.remove('active');
    sideMenu.setAttribute('aria-hidden', 'true');
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
  }
}

if (menuToggle) {
  menuToggle.addEventListener('click', openMenu);
}

if (closeMenu) {
  closeMenu.addEventListener('click', closeMenuFn);
}

if (sideMenu) {
  sideMenu.addEventListener('click', (e) => {
    if (e.target === sideMenu) {
      closeMenuFn();
    }
  });
}

// MODAL DE DETALLES DE TERRENOS
const modal = document.getElementById('detailsModal');
const modalBackdrop = document.getElementById('modalBackdrop');
const closeModalBtn = document.getElementById('closeModal');

const modalImage = document.getElementById('modalImage');
const modalPrice = document.getElementById('modalPrice');
const modalArea = document.getElementById('modalArea');
const modalLocation = document.getElementById('modalLocation');
const modalPhone = document.getElementById('modalPhone');
const modalDesc = document.getElementById('modalDesc');

function openModal(lotCard) {
  const id = lotCard.getAttribute('data-id');
  const price = lotCard.getAttribute('data-price');
  const area = lotCard.getAttribute('data-area');
  const phone = lotCard.getAttribute('data-phone');
  const location = lotCard.getAttribute('data-location');
  const desc = lotCard.getAttribute('data-desc');
  
  const img = lotCard.querySelector('.lot-image img');
  const imgSrc = img ? img.src : '';

  if (modalImage) modalImage.src = imgSrc;
  if (modalPrice) modalPrice.textContent = parseInt(price).toLocaleString('es-PY') + ' Gs';
  if (modalArea) modalArea.textContent = area;
  if (modalLocation) modalLocation.textContent = location;
  if (modalPhone) {
    modalPhone.textContent = phone;
    modalPhone.href = 'tel:' + phone.replace(/\s/g, '');
  }
  if (modalDesc) modalDesc.textContent = desc;

  if (modal) {
    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
  }
}

function closeModal() {
  if (modal) {
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
  }
}

const detailButtons = document.querySelectorAll('[data-action="details"]');
detailButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const lotCard = btn.closest('.lot-card');
    if (lotCard) openModal(lotCard);
  });
});

if (closeModalBtn) {
  closeModalBtn.addEventListener('click', closeModal);
}

if (modalBackdrop) {
  modalBackdrop.addEventListener('click', closeModal);
}

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    closeModal();
    closeMenuFn();
  }
});

updateCounter();

// Desactivar contador de árbol y quitar botón de simulación
(function disableTreeCounter(){
  const demoBtn = document.getElementById('demoInc');
  if (demoBtn) demoBtn.remove();
  // Si hay funciones que actualizan el contador, las anulamos (no-op)
  window.updateTreeCounter = function(){};
})();

console.log('Eco Verde YvyPorã - Script cargado correctamente');