<div x-data="attendanceTimer()" class="relative flex justify-end mb-5 z-10">
    <!-- Button and Dropdown -->
    <button @click="toggleDropdown()" class="rounded-lg block px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-md w-48">
        <span x-text="selectedText"></span>
        <svg class="w-4 h-4 inline-block ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <ul x-show="open" @click.away="open = false" class="absolute mt-12 w-48 bg-white rounded-lg shadow-lg border border-gray-300">
        <li @click="startTimer('login', 'Login', 0); open = false" class="px-4 py-2 hover:bg-gray-100 rounded-t-lg cursor-pointer">Login</li>
        <li @click="startTimer('break1', 'Break 1', 15 * 60); open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Break 1</li>
        <li @click="startTimer('break2', 'Break 2', 15 * 60); open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Break 2</li>
        <li @click="startTimer('lunch', 'Lunch', 60 * 60); open = false" class="px-4 py-2 hover:bg-gray-100 rounded-b-lg cursor-pointer">Lunch</li>
        <li @click="startTimer('logout', 'Logout', 0); open = false" class="px-4 py-2 hover:bg-gray-100 rounded-t-lg cursor-pointer">Logout</li>
    </ul>

    <!-- Timer Display -->
    <div x-show="timeLeft > 0 && selected !== 'login'" class="mt-4">
        <p class="text-sm text-gray-700">Time Remaining: <span x-text="formattedTime"></span></p>
    </div>
    
    <!-- Hidden Form -->
    <form x-ref="form" action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <input type="hidden" name="status" x-bind:value="selected">
        <input type="hidden" name="overbreak" x-bind:value="overbreak ? 'true' : 'false'">
    </form>
</div>

<script>
    function attendanceTimer() {
    return {
        open: false,
        selected: 'login',
        selectedText: 'Login',
        timeLeft: 0,
        timerInterval: null,
        overbreak: false,
        hasStarted: false, // Add this flag

        init() {
            // Load saved state from localStorage
            const savedState = JSON.parse(localStorage.getItem('attendanceTimerState'));
            if (savedState) {
                this.selected = savedState.selected;
                this.selectedText = savedState.selectedText;
                this.timeLeft = savedState.timeLeft;
                this.overbreak = savedState.overbreak;

                if (this.timeLeft > 0) {
                    this.hasStarted = true; // Set flag to true
                    this.startTimer(this.selected, this.selectedText, this.timeLeft, true);
                }
            }
        },

        // Toggle Dropdown
        toggleDropdown() {
            this.open = !this.open;
        },

        // Start Timer
        startTimer(status, text, time, fromLocalStorage = false) {
            this.selected = status;
            this.selectedText = text;
            this.timeLeft = time;
            this.overbreak = false;

            clearInterval(this.timerInterval);

            if (this.timeLeft > 0) {
                if (!fromLocalStorage) {
                    localStorage.setItem('attendanceTimerState', JSON.stringify({
                        selected: this.selected,
                        selectedText: this.selectedText,
                        timeLeft: this.timeLeft,
                        overbreak: this.overbreak
                    }));
                }

                this.timerInterval = setInterval(() => {
                    if (this.timeLeft > 0) {
                        this.timeLeft--;
                        localStorage.setItem('attendanceTimerState', JSON.stringify({
                            selected: this.selected,
                            selectedText: this.selectedText,
                            timeLeft: this.timeLeft,
                            overbreak: this.overbreak
                        }));
                    } else {
                        this.overbreak = true;
                        clearInterval(this.timerInterval);
                        localStorage.removeItem('attendanceTimerState');
                        alert('You have exceeded the break time!');
                    }
                }, 1000);
            } else {
                localStorage.removeItem('attendanceTimerState');
            }

            if (!fromLocalStorage) {
                this.submitAttendance();
            }
        },

        // Format time in mm:ss
        get formattedTime() {
            const minutes = Math.floor(this.timeLeft / 60);
            const seconds = this.timeLeft % 60;
            return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        },

        // Submit Form
        submitAttendance() {
            // Reference form using x-ref
            const form = this.$refs.form;
            form.querySelector('input[name="status"]').value = this.selected;
            form.querySelector('input[name="overbreak"]').value = this.overbreak ? 'true' : 'false';
            
            // Submit form via AJAX
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(response => {
                if (response.ok) {
                    console.log('Attendance recorded successfully');
                } else {
                    return response.json().then(data => {
                        console.error('Failed to record attendance:', data);
                    });
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    };
}

</script>
