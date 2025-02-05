document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.gallery-track');
    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.next');
    const prevButton = document.querySelector('.prev');
    let currentIndex = 0;

    // Update classes for visible slides
    function updateSlideClasses() {
        slides.forEach((slide, index) => {
            slide.classList.remove('visible');
            
            // Add visible class to current and adjacent slides
            if (index >= currentIndex - 1 && index <= currentIndex + 1) {
                slide.classList.add('visible');
            }
        });
    }

    function updateSlidePosition() {
        const slideWidth = slides[0].offsetWidth + 20; // Width + margin
        track.style.transform = `translateX(${-currentIndex * slideWidth}px)`;
        updateSlideClasses();
        updateButtonVisibility();
    }

    function updateButtonVisibility() {
        
        // get the index of the last visible slide
        let lastVisibleSlideIndex = 0;
        let firstVisibleSlideIndex = null;
        slides.forEach((slide, index) => {
            if (slide.classList.contains('visible') && firstVisibleSlideIndex === null) {
                firstVisibleSlideIndex = index;
            }
            if (slide.classList.contains('visible')) {
                lastVisibleSlideIndex = index;
            }
        });

        // Hide/show buttons based on current slide index
        if (lastVisibleSlideIndex === slides.length - 1) {
            console.log('reached end');
            nextButton.style.display = "none";
        } else {
            nextButton.style.display = "flex";
        }
        if (firstVisibleSlideIndex == 0) {
            prevButton.style.display = "none";
        } else {
            prevButton.style.display = "flex";
        }
    }

    nextButton.addEventListener('click', () => {
        if (currentIndex < slides.length - 1) {
            currentIndex++;
        }
        updateSlidePosition();
    });
    
    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        }
        updateSlidePosition();
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') {
            nextButton.click();
        } else if (e.key === 'ArrowLeft') {
            prevButton.click();
        }
    });

    // Touch events for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    track.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
    });

    track.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].clientX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextButton.click();
            } else {
                prevButton.click();
            }
        }
    }

    // Initialize the carousel
    updateSlidePosition();

    // Update on window resize
    window.addEventListener('resize', updateSlidePosition);
});