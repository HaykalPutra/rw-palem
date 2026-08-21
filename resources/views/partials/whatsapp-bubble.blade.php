{{--
  Tombol WhatsApp mengambang (floating action button).
  bottom-24 dipakai supaya tidak ketutupan/nabrak banner "Install App" PWA
  yang biasanya nongol di bawah layar HP. Kalau di HP-mu ternyata masih
  ketiban, tinggal naikkan angka bottom-24 -> bottom-28 / bottom-32.
--}}
<a href="https://wa.me/{{ setting('contact.wa', '02287506667') }}"
   target="_blank" rel="noopener noreferrer"
   class="fixed z-40 bottom-24 right-5 md:bottom-6 w-14 h-14 rounded-full bg-green-500 hover:bg-green-600 active:scale-95 transition-all shadow-lg shadow-green-900/20 flex items-center justify-center"
   aria-label="Chat via WhatsApp">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-white">
    <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.29-1.39a9.9 9.9 0 0 0 4.75 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.96 6.45 17.5 2 12.04 2Zm5.8 14.15c-.24.68-1.4 1.32-1.93 1.4-.5.08-1.13.11-1.82-.12-.42-.13-.96-.31-1.65-.61-2.91-1.26-4.8-4.2-4.95-4.4-.15-.19-1.18-1.57-1.18-3 0-1.42.75-2.12 1.02-2.41.27-.29.58-.36.78-.36h.56c.18 0 .42-.07.65.5.24.58.81 2 .88 2.15.07.15.12.32.02.51-.09.19-.14.31-.28.48-.14.17-.29.37-.42.5-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.6-.07.16-.19.68-.79.87-1.06.18-.27.36-.22.6-.13.24.09 1.53.72 1.79.85.26.13.43.19.5.3.06.11.06.65-.18 1.33Z"/>
  </svg>
</a>