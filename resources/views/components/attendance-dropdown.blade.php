<div x-data="attendanceTimer()" class="relative flex justify-end mb-5 z-50">
    <!-- Button and Dropdown -->
    <button @click="toggleDropdown()" class="rounded-lg block px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-md w-48">
        <span x-text="selectedText"></span>
        <svg class="w-4 h-4 inline-block ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 0" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <ul x-show="open" @click.away="open = false" class="absolute mt-12 w-48 bg-white rounded-lg shadow-lg border border-gray-300">
        <li @click="startTimer('login', 'Login', 60); open = false" class="px-4 py-2 hover:bg-gray-100 rounded-t-lg cursor-pointer">Login</li>
        <li @click="startTimer('break1', 'Break 1', 60); open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Break 1 (1 min)</li>
        <li @click="startTimer('break2', 'Break 2', 60); open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Break 2 (1 min)</li>
        <li @click="startTimer('lunch', 'Lunch', 60); open = false" class="px-4 py-2 hover:bg-gray-100 rounded-b-lg cursor-pointer">Lunch (1 min)</li>
    </ul>

    <!-- Timer Display -->
    <div x-show="timeLeft > 0 && selected !== 'login'" class="mt-4">
        <p class="text-sm text-gray-700">Time Remaining: <span x-text="formattedTime"></span></p>
    </div>

    <!-- Overbreak Warning -->
    <div x-show="overbreak" class="mt-2">
        <p class="text-red-500 text-sm">You have exceeded the break/lunch time!</p>
    </div>
    
    <!-- Hidden Form -->
    <form id="attendanceForm" action="{{ route('attendance.store') }}" method="POST" x-ref="form">
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
            onBreakOrLunch: false, // Track if currently on break/lunch

            // Toggle Dropdown
            toggleDropdown() {
                this.open = !this.open;
            },

            // Start Timer and initialize countdown based on selected status
            startTimer(status, text, time) {
                if (status === 'login') {
                    this.handleLoginWhileOnBreakOrLunch();
                    return;
                }
                this.selected = status;
                this.selectedText = text;
                this.timeLeft = time;
                this.overbreak = false;
                this.onBreakOrLunch = status !== 'login'; // Mark as on break/lunch

                // Clear any existing timer intervals
                clearInterval(this.timerInterval);

                // Start a countdown timer
                this.timerInterval = setInterval(() => {
                    if (this.timeLeft > 0) {
                        this.timeLeft--;
                    } else {
                        // Flag if the user exceeds the time
                        this.overbreak = true;
                        clearInterval(this.timerInterval);
                        this.submitAttendance();
                    }
                }, 1000);
            },

            // Handle login while on break/lunch
            handleLoginWhileOnBreakOrLunch() {
                if (this.onBreakOrLunch) {
                    this.selected = 'login'; // Update status to login
                    this.selectedText = 'Login'; // Update button text
                    this.overbreak = false; // No overbreak for login
                    clearInterval(this.timerInterval); // Stop the timer
                }
                this.submitAttendance(); // Submit attendance immediately
                this.onBreakOrLunch = false; // Reset break/lunch status
            },

            // Format time as mm:ss
            get formattedTime() {
                const minutes = Math.floor(this.timeLeft / 60);
                const seconds = this.timeLeft % 60;
                return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            },

            // Submit Form
            submitAttendance() {
                const formData = new FormData(this.$refs.form);
                formData.set('overbreak', this.overbreak ? 'true' : 'false'); // Ensure correct value is set
                console.log('Form Data:', Object.fromEntries(formData.entries())); // Debug form data
            
                fetch(this.$refs.form.action, {
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
