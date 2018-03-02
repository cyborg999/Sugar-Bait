// Get modal element
var lmodal = document.getElementById('loginModal');
// Get open modal button
var LmodalBtn = document.getElementById('LmodalBtn');
// Get close button
var LcloseBtn = document.getElementsByClassName('LcloseBtn')[0];

// Listen for open click
LmodalBtn.addEventListener('click', openModal);
// Listen for close click
LcloseBtn.addEventListener('click', closeModal);
// Listen for outside click
window.addEventListener('click', outsideClick);

// Function to open modal
function openModal(){
  lmodal.style.display = 'block';
}

// Function to close modal
function closeModal(){
  lmodal.style.display = 'none';
}

// Function to close modal if outside click
function outsideClick(e){
  if(e.target == lmodal){
    lmodal.style.display = 'none';
  }
}