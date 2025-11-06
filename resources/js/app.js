import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Calendar Component - Ready to be made dynamic with API calls
window.calendarComponent = () => {
    return {
        currentDate: new Date(),
        selectedDate: null,
        weekDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        calendarDays: [],
        events: [], // This will be populated from API soon
        monthYear: '',
        selectedDateEvents: [],
        selectedDateText: '',

        init() {
            this.updateCalendar();
        },

        updateCalendar() {
            const year = this.currentDate.getFullYear();
            const month = this.currentDate.getMonth();
            
            // Update month/year display
            this.monthYear = this.currentDate.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
            
            // Get first day of month and days in month
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const daysInMonth = lastDay.getDate();
            const startingDayOfWeek = firstDay.getDay();
            
            // Build calendar days array
            const days = [];
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            // Add previous month's days
            const prevMonth = new Date(year, month, 0);
            const daysInPrevMonth = prevMonth.getDate();
            for (let i = startingDayOfWeek; i > 0; i--) {
                const date = new Date(year, month - 1, daysInPrevMonth - i + 1);
                const dateOnly = new Date(date);
                dateOnly.setHours(0, 0, 0, 0);
                days.push({
                    date: daysInPrevMonth - i + 1,
                    fullDate: dateOnly,
                    isCurrentMonth: false,
                    isToday: false,
                    isSelected: false,
                    events: this.getEventsForDate(dateOnly)
                });
            }
            
            // Add current month's days
            for (let day = 1; day <= daysInMonth; day++) {
                const date = new Date(year, month, day);
                const dateOnly = new Date(date);
                dateOnly.setHours(0, 0, 0, 0);
                
                days.push({
                    date: day,
                    fullDate: dateOnly,
                    isCurrentMonth: true,
                    isToday: dateOnly.getTime() === today.getTime(),
                    isSelected: false,
                    events: this.getEventsForDate(dateOnly)
                });
            }
            
            // Add next month's days to fill the grid (ensure exactly 42 days = 6 weeks)
            const totalDays = days.length;
            const remainingDays = 42 - totalDays; // 6 weeks * 7 days
            for (let day = 1; day <= remainingDays; day++) {
                const date = new Date(year, month + 1, day);
                const dateOnly = new Date(date);
                dateOnly.setHours(0, 0, 0, 0);
                days.push({
                    date: day,
                    fullDate: dateOnly,
                    isCurrentMonth: false,
                    isToday: false,
                    isSelected: false,
                    events: this.getEventsForDate(dateOnly)
                });
            }
            
            // Group into weeks
            this.calendarDays = [];
            for (let i = 0; i < days.length; i += 7) {
                this.calendarDays.push(days.slice(i, i + 7));
            }
        },

        getEventsForDate(date) {
            // TODO: Replace with API call to fetch events
            // For now, return empty array - ready to be made dynamic
            // Example API call:
            // return await fetch(`/api/events?date=${date.toISOString()}`)
            //     .then(res => res.json());
            
            return this.events.filter(event => {
                const eventDate = new Date(event.date);
                return eventDate.toDateString() === date.toDateString();
            });
        },

        previousMonth() {
            this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() - 1, 1);
            this.updateCalendar();
        },

        nextMonth() {
            this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 1);
            this.updateCalendar();
        },

        goToToday() {
            this.currentDate = new Date();
            this.updateCalendar();
            // Also select today's date
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const todayDay = this.calendarDays
                .flat()
                .find(day => day.fullDate.getTime() === today.getTime());
            if (todayDay) {
                this.selectDate(todayDay);
            }
        },

        selectDate(day) {
            // Clear previous selection
            this.calendarDays.flat().forEach(d => d.isSelected = false);
            
            // Select new date
            day.isSelected = true;
            this.selectedDate = day.fullDate;
            this.selectedDateText = day.fullDate.toLocaleDateString('en-US', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            
            // Get events for selected date
            this.selectedDateEvents = day.events.map(event => ({
                ...event,
                date: day.fullDate
            }));
        }
    };
};

Alpine.start();
