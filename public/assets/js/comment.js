document.addEventListener('DOMContentLoaded', () => {

    const testimonialContainer = document.getElementById('testimonialContainer');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    let currentIndex = 0;

    // Data testimonial
    const testimonials = [
        {
            stars: 5,
            comment: "It was such as a great choice <br>to invest in the reliable systems that BankMo has provide for me.",
            name: "Amanda",
            role: "Sr Credit Analyst",
            image: "assets/images/photos/profile-picture.png"
        },
        {
            stars: 5,
            comment: "BankMo's reliable systems are truly exceptional and easy to use.",
            name: "John",
            role: "Financial Advisor",
            image: "assets/images/photos/profile-picture.png"
        },
        {
            stars: 5,
            comment: "I am very satisfied with the reliable systems provided by BankMo.",
            name: "Sarah",
            role: "Investment Manager",
            image: "assets/images/photos/profile-picture.png"
        }
    ];

    // Fungsi untuk render testimonial
    function renderTestimonial(index, direction) {
        const testimonial = testimonials[index];
        testimonialContainer.innerHTML = `
            <div class="flex flex-col items-center w-full flex-none ${direction === 'next' ? 'slide-in-right' : 'slide-in-left'}">
                <div class="flex gap-x-[14px]">
                    ${Array.from({ length: testimonial.stars }, () => `<img src="assets/images/icons/star.svg" alt="Star" class="w-[22px] h-[22px] shrink-0">`).join('')}
                </div>
                <div class="mt-[30px] px-[211px]">
                    <p class="text-[40px] leading-[70px] text-center">${testimonial.comment.replace(
                        /reliable systems/g, 
                        '<span class="font-semibold">reliable systems</span>'
                    )}</p>
                </div>
                <div class="mt-[30px] flex items-center gap-x-[24px]">
                    <div class="w-[80px] h-[80px] border border-[#78839E] rounded-full flex items-center justify-center">
                        <img src="${testimonial.image}" alt="${testimonial.name}" class="w-[70px] h-[70px] rounded-full object-cover object-center shrink-0">
                    </div>
                    <div>
                        <p class="text-[20px] font-medium text-[#13214A]">${testimonial.name}</p>
                        <p class="text-[16px] text-[#77809D]">${testimonial.role}</p>
                    </div>
                </div>
            </div>
        `;
    }

    // Fungsi untuk slide testimonial
    function slide(direction) {
        // Hapus animasi sebelumnya
        testimonialContainer.classList.remove('slide-in-right', 'slide-in-left');

        // Update index berdasarkan arah
        currentIndex = direction === 'next' ? (currentIndex + 1) % testimonials.length : (currentIndex - 1 + testimonials.length) % testimonials.length;

        // Render testimonial baru dengan animasi
        renderTestimonial(currentIndex, direction);
    }

    // Event listener untuk tombol navigasi
    prevButton.addEventListener('click', () => slide('prev'));
    nextButton.addEventListener('click', () => slide('next'));

    // Render testimonial pertama
    renderTestimonial(currentIndex, 'next');
});