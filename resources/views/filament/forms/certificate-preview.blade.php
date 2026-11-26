<div x-data="{
    x: @js($x_pos),
    y: @js($y_pos),
    isDragging: false,
    startX: 0,
    startY: 0,

    startDrag(e) {
        this.isDragging = true;
        // Mendapatkan koordinat klik awal berdasarkan skala gambar
        const rect = this.$refs.container.getBoundingClientRect();
        const scaleX = this.$refs.container.naturalWidth / rect.width;
        const scaleY = this.$refs.container.naturalHeight / rect.height;

        this.startX = (e.clientX - rect.left) * scaleX - this.x;
        this.startY = (e.clientY - rect.top) * scaleY - this.y;
    },

    onDrag(e) {
        if (!this.isDragging) return;

        const rect = this.$refs.container.getBoundingClientRect();
        const scaleX = this.$refs.container.naturalWidth / rect.width;
        const scaleY = this.$refs.container.naturalHeight / rect.height;

        // Hitung posisi baru
        let newX = (e.clientX - rect.left) * scaleX - this.startX;
        let newY = (e.clientY - rect.top) * scaleY - this.startY;

        // Batasi agar tidak keluar gambar
        this.x = Math.max(0, Math.min(newX, this.$refs.container.naturalWidth));
        this.y = Math.max(0, Math.min(newY, this.$refs.container.naturalHeight));

        // Sinkronkan nilai ke form Filament
        @this.set('data.cert_x_position', Math.round(this.x));
        @this.set('data.cert_y_position', Math.round(this.y));
    },

    stopDrag() {
        this.isDragging = false;
    }
}"
    class="mt-4 p-4 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl">
    @if ($template)
        <p
            class="text-xs text-gray-500 dark:text-gray-400 mb-2 font-bold uppercase tracking-wider flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
            </svg>
            Geser teks di bawah ini untuk mengatur posisi pada sertifikat
        </p>

        <div
            class="relative inline-block w-full overflow-hidden rounded-lg shadow-sm border border-gray-300 dark:border-gray-600 bg-gray-100">
            <!-- Gambar Background Sertifikat -->
            <img x-ref="container" src="{{ Storage::url(is_array($template) ? reset($template) : $template) }}"
                class="w-full h-auto block select-none pointer-events-none" alt="Template Sertifikat">

            <!-- Teks yang bisa di-drag -->
            <div @mousedown.prevent="startDrag($event)" @mousemove.window="onDrag($event)" @mouseup.window="stopDrag()"
                @mouseleave.window="stopDrag()"
                class="absolute cursor-move select-none whitespace-nowrap border border-transparent hover:border-emerald-500 hover:bg-emerald-500/20 transition-colors p-1"
                :style="`left: ${(x / $refs.container?.naturalWidth || 1920) * 100}%; top: ${(y / $refs.container?.naturalHeight || 1080) * 100}%; transform: translate(-50%, -50%);`">
                <!-- Teks Preview -->
                <div class="pointer-events-none text-center drop-shadow-sm"
                    style="
                        font-family: '{{ $font_family }}', sans-serif;
                        font-size: {{ $font_size }}px;
                        color: {{ $font_color }};
                        font-weight: {{ $font_bold ? 'bold' : 'normal' }};
                        line-height: 1.2;
                    ">
                    Dr. Ahmad Fauzi, M.Kom<br>
                    <span style="font-size: {{ $font_size * 0.8 }}px;">NIDN. 0712345678</span>
                </div>
            </div>
        </div>

        <p class="text-xs text-gray-500 mt-2">
            Posisi X: <span x-text="Math.round(x)"></span>px, Posisi Y: <span x-text="Math.round(y)"></span>px
        </p>
    @else
        <div
            class="text-center py-8 text-gray-400 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-900">
            <svg class="w-10 h-10 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            <p class="text-sm font-medium">Unggah template sertifikat terlebih dahulu untuk melihat preview.</p>
        </div>
    @endif
</div>
