document.addEventListener('DOMContentLoaded', function() {
    const searchContainer = document.getElementById('search-form-livewire');
    const magnifierIcon = document.getElementById('magnifier-icon');
    const closeButton = document.getElementById('close-overlay');
    const searchInput = searchContainer.querySelector('.text');

    // فرض می‌کنیم که کلاس 'overlay-open' روی BODY یا یک کانتینر بزرگتر اضافه می‌شود
    // تا استایل‌دهی Overlay تمام صفحه به درستی انجام شود.
    // اگر این امکان وجود ندارد، همانطور که در کد قبلی بود، کلاس را روی searchContainer اضافه می‌کنیم.
    const OVERLAY_CLASS = 'active';

    function openSearch() {
        // فعال کردن حالت Overlay
        searchContainer.classList.add(OVERLAY_CLASS);
        closeButton.classList.add(OVERLAY_CLASS);

        // فوکوس روی اینپوت
        if (searchInput) {
            searchInput.focus();
        }
    }

    function closeSearch() {
        // غیرفعال کردن حالت Overlay
        searchContainer.classList.remove(OVERLAY_CLASS);
        closeButton.classList.remove(OVERLAY_CLASS);

        // در اینجا Livewire مسئول مدیریت wire:model.live="char" است
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
        if (e.key === 'Escape' && searchContainer.classList.contains(OVERLAY_CLASS)) {
            closeSearch();
        }
    });

    // 4. بستن با کلیک روی ناحیه ای که Overlay را پوشانده است
    // این قسمت نیاز به دقت زیاد در CSS دارد. اگر searchContainer کل صفحه را پوشش دهد:
    searchContainer.addEventListener('click', function(e) {
        // اگر کلیک مستقیماً روی خود فرم اصلی (که حالا نقش Overlay را دارد) انجام شد
        if (e.target === searchContainer && searchContainer.classList.contains(OVERLAY_CLASS)) {
            closeSearch();
        }
    });
});
