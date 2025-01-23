// Tutup pop-up saat tombol OK diklik
const closePopup = document.getElementById('closePopup');
if (closePopup) {
    closePopup.addEventListener('click', () => {
        const popup = document.getElementById('popup');
        popup.style.display = 'none';
    });
}