<template>
    <div v-if="events" class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <FullCalendar :options="calendarOptions" class="w-100" />
            </div>
        </div>
    </div>
</template>

<script setup >
    import FullCalendar from '@fullcalendar/vue3';
    import dayGridPlugin  from '@fullcalendar/daygrid'
    import interactionPlugin from '@fullcalendar/interaction';
    import { computed } from "vue";

    const props = defineProps(['events']);

    const events = computed(() => { return props.events });

    const calendarOptions = {
        plugins: [ dayGridPlugin, interactionPlugin ],
        aspectRatio: 1.5,
        initialView: 'dayGridMonth',
        events: events.value
    }
</script>