<template>
  <div>
    <Head title="Calendar Full" />

    <Heading class="mb-6">Calendar Full</Heading>

    <Card
      class="flex flex-col items-center justify-center"
      style="min-height: 300px"
    >
      <CalendarComponent :events="events"></CalendarComponent>
    </Card>
  </div>
</template>

<script setup>
  import CalendarComponent from '../components/CalendarComponent.vue';
  const events = defineProps(['events']);
</script>
