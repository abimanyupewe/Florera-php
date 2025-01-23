const sliderTesti = document.getElementById('testimonial-slider');
        const dotsTesti = document.querySelectorAll('[data-slide]');
        let currentIndexTesti = 0;

        function showSlide(indexTesti) {
          sliderTesti.style.transform = `translateX(-${indexTesti * 100}%)`;
          dotsTesti.forEach((dotsTesti, i) => {
            dotsTesti.classList.toggle('bg-gray-800', i === indexTesti);
            dotsTesti.classList.toggle('bg-gray-400', i !== indexTesti);
          });
        }

        function autoSlide() {
          currentIndexTesti = (currentIndexTesti + 1) % dotsTesti.length;
          showSlide(currentIndexTesti);
        }

        dotsTesti.forEach((dotsTesti, indexTesti) => {
          dotsTesti.addEventListener('click', () => {
            currentIndexTesti = indexTesti;
            showSlide(currentIndexTesti);
          });
        });

        setInterval(autoSlide, 5000);
        showSlide(currentIndexTesti);