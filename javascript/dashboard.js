document.addEventListener('DOMContentLoaded', () => {
    const openCameraButton = document.getElementById('openCameraButton');
    const takePhotoButton = document.getElementById('takePhotoButton');
    const uploadImageInput = document.getElementById('uploadImageInput');
    const cameraFeed = document.getElementById('cameraFeed');
    const photoCanvas = document.getElementById('photoCanvas');
    const capturedPhoto = document.getElementById('capturedPhoto');
    let stream = null;

    // Check if the browser supports WebRTC
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        alert('WebRTC is not supported in this browser');
        return;
    }

    // Function to open the camera
    async function openCamera() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            cameraFeed.srcObject = stream;
            cameraFeed.style.display = 'block';
            takePhotoButton.style.display = 'block'; // Show the "Take Photo" button
        } catch (error) {
            console.error('Error accessing the camera:', error);
        }
    }
    // Function to update the HTML with the server response
    function updateResultDiv(response) {
        // Assuming you have an element with the id 'results' to display the output
        const resultsDiv = document.getElementById('resultstest');

        // Update the content of the 'results' div with the response
        resultsDiv.innerHTML = response;
}
    // Function to capture a photo
    function capturePhoto() {
        console.log('Capture photo function called');
        if (stream) {
            const context = photoCanvas.getContext('2d');
            photoCanvas.width = cameraFeed.videoWidth;
            photoCanvas.height = cameraFeed.videoHeight;
            context.drawImage(cameraFeed, 0, 0, photoCanvas.width, photoCanvas.height);
            capturedPhoto.src = photoCanvas.toDataURL('image/jpeg'); // Convert to base64
            capturedPhoto.style.display = 'block';

            // Stop the camera stream
            const tracks = stream.getTracks();
            tracks.forEach((track) => {
                track.stop();
            });

            // Hide the camera feed
            cameraFeed.srcObject = null;
            cameraFeed.style.display = 'none';

            // Hide the "Take Photo" button
            takePhotoButton.style.display = 'none';
            // Update the alt attribute
            capturedPhoto.alt = 'Captured Photo';            
        }
    }

    

    // Function to handle image upload
    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function () {
                capturedPhoto.src = reader.result;
                capturedPhoto.style.display = 'block';
                capturedPhoto.alt = 'Uploaded Photo';
            };
            reader.readAsDataURL(file);
        }
    }

    // Attach event listeners to the buttons and input
    openCameraButton.addEventListener('click', openCamera);
    takePhotoButton.addEventListener('click', capturePhoto);
    uploadImageInput.addEventListener('change', handleImageUpload);
  });

  // Function to show div2
  function showDiv2() {
    const div1 = document.getElementById('div1');
    const div2 = document.getElementById('div2');
    const div3 = document.getElementById('div3');

    div1.style.display = 'none';
    div2.style.display = 'block';
    div3.style.display = 'none';
    
    // Hide the "Track Progress" link
    // const trackProgressLink = document.querySelector('.card-link:last-child');
    // trackProgressLink.style.display = 'none';
  }

    // Function to show div3
    function showDiv3() {
        const div1 = document.getElementById('div1');
        const div2 = document.getElementById('div2');
        const div3 = document.getElementById('div3');

        div1.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'block';

         // Show the "Track Progress" link
        // const trackProgressLink = document.querySelector('.card-link:last-child');
        // trackProgressLink.style.display = 'block';
    }

      // Attach event listeners to the card links
      const selectPhotoLink = document.querySelector('.card-link:first-child');
      const trackProgressLink = document.querySelector('.card-link:last-child');

      selectPhotoLink.addEventListener('click', showDiv2);
      trackProgressLink.addEventListener('click', showDiv3);

      function toggleNavbar() {
            var navbar = document.querySelector(".navbar");
            navbar.classList.toggle("active");
        }
        