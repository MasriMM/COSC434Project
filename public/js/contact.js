function toggleFAQ(button) {
    let faqItem = button.closest('.faq-item');
    let answer = faqItem.querySelector('.faq-answer');
    let icon = button.querySelector('i');

    if (answer.classList.contains('max-h-0')) {
        answer.classList.remove('max-h-0');
        answer.classList.add('max-h-full');
        answer.classList.remove('opacity-0');
        answer.classList.add('opacity-100');
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-times');
    } else {
        answer.classList.remove('max-h-full');
        answer.classList.add('max-h-0');
        answer.classList.remove('opacity-100');
        answer.classList.add('opacity-0');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-plus');
    }
}