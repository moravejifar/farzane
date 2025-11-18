تنظیمات پایه کانتینر
.search-bar-container {
    width: 60px; /* اندازه اولیه (بسته) */
    height: 60px;
    background: #fff;
    border-radius: 60px;
    padding: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    transition: width 0.5s; /* تعریف انیمیشن تغییر عرض */
}

/* حالت فعال (باز شده) */
.search-bar-container.active {
    width: 300px; /* اندازه نهایی (باز) */
}

/* تنظیمات ذره‌بین */
.magnifier {
    cursor: pointer;
    width: 40px;
    height: 40px;
}

/* تنظیمات فیلد ورودی */
.search-bar-container input.text {
    border: none;
    outline: none;
    background: transparent;
    padding: 0;
    width: 0; /* عرض اولیه صفر است */
    transition: 0.5s;
    font-size: 16px;
    margin-left: 0; /* فاصله اولیه */
}

/* وقتی کانتینر فعال شد، فیلد ورودی ظاهر شود */
.search-bar-container.active input.text {
    width: 220px; /* عرض فیلد ورودی در حالت فعال */
    padding: 0 10px;
    margin-left: 10px;
}

/* پنهان کردن آیکون میکروفون در حالت بسته */
.mic-icon {
    opacity: 0;
    pointer-events: none; /* برای جلوگیری از کلیک‌های ناخواسته */
    transition: opacity 0.3s;
}

/* نمایش آیکون میکروفون در حالت باز */
.search-bar-container.active .mic-icon {
    opacity: 1;
    pointer-events: auto;
}

 <script>
document.addEventListener('DOMContentLoaded', function() {
    const searchContainer = document.getElementById('search-form-livewire');
    const magnifierIcon = document.getElementById('magnifier-icon');
    const closeButton = document.getElementById('close-overlay');
    const searchInput = searchContainer ? searchContainer.querySelector('.text') : null;

    const OVERLAY_CLASS = 'active';

    function openSearch() {
        if (!searchContainer) return;
        searchContainer.classList.add(OVERLAY_CLASS);
        closeButton.classList.add(OVERLAY_CLASS);

        // فوکوس روی اینپوت برای شروع تایپ
        if (searchInput) {
            searchInput.focus();
        }
    }

    function closeSearch() {
        if (!searchContainer) return;
        searchContainer.classList.remove(OVERLAY_CLASS);
        closeButton.classList.remove(OVERLAY_CLASS);
    }

    // 1. باز کردن با کلیک روی آیکون ذره‌بین
    if (magnifierIcon) {
        magnifierIcon.addEventListener('click', function(e) {
            e.preventDefault();
            openSearch();
        });
    }

    // 2. بستن با کلیک روی دکمه X
    if (closeButton) {
        closeButton.addEventListener('click', function(e) {
            e.preventDefault();
            closeSearch();
        });
    }

    // 3. بستن با فشردن کلید Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && searchContainer && searchContainer.classList.contains(OVERLAY_CLASS)) {
            closeSearch();
        }
    });

    // 4. بستن با کلیک روی ناحیه تیره (خارج از فرم مرکزی)
    // این به دلیل استایل‌دهی شما که 'pointer-events: none' دارد، نیاز به بررسی دقیق دارد.
    // اگر Overlay روی تمام صفحه قرار دارد (height: 100% و pointer-events: auto در حالت active)،
    // کلیک روی هر جای صفحه باید بسته شدن را فراخوانی کند، مگر روی خود فرم.
    searchContainer.addEventListener('click', function(e) {
        // اگر کلیک روی خود searchContainer بود (که کل صفحه را پوشانده) و نه روی عناصر داخلی
        if (e.target === searchContainer && searchContainer.classList.contains(OVERLAY_CLASS)) {
            closeSearch();
        }
    });
});
</script>

