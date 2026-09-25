<x-filament-widgets::widget>
    <x-filament::section>
        <div style="display: flex; align-items: center; gap: 16px;">

            {{-- Avatar --}}
            <div
                style="
                    width: 48px;
                    height: 48px;
                    min-width: 48px;
                    border-radius: 50%;
                    background: #111827;
                    color: white;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 18px;
                    font-weight: 600;
                "
            >
                {{ $this->getUserInitial() }}
            </div>

            {{-- User Information --}}
            <div>
                <div
                    style="
                        font-size: 14px;
                        color: #6b7280;
                    "
                >
                    Welcome
                </div>

                <div
                    style="
                        font-size: 16px;
                        font-weight: 600;
                        margin-top: 2px;
                    "
                >
                    {{ $this->getUserName() }}
                </div>

                <div
                    style="
                        font-size: 13px;
                        color: #6b7280;
                        margin-top: 2px;
                    "
                >
                    Role: {{ $this->getUserRole() }}
                </div>
            </div>

        </div>
    </x-filament::section>
</x-filament-widgets::widget>