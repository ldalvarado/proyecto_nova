<template>
  <div>
    <div>
      <VOnboardingWrapper ref="wrapper" :steps="steps" />
      <heading class="mb-6">
        User Viewer <button class="flex-shrink-0 shadow rounded focus:outline-none 
          ring-primary-200 dark:ring-gray-600 focus:ring bg-primary-500 
          hover:bg-primary-400 active:bg-primary-600 
          text-white dark:text-gray-800 inline-flex 
          items-center 
          font-bold 
          px-4 h-9 text-sm flex-shrink-0"
          @click="() => start()"
        >See it in action</button>
        
      </heading>
      <div class="flex">
        <div class="w-full flex items-center mb-6">
          <div class="flex-shrink-0 ml-auto">
            <a size="md"  class="flex-shrink-0 shadow rounded focus:outline-none ring-primary-200 dark:ring-gray-600 
            focus:ring bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white 
            dark:text-gray-800 inline-flex items-center font-bold px-4 h-9 text-sm flex-shrink-0"
             dusk="create-button" href="/nova/resources/users/new"><div class="last-element">
        <p>Creater user</p>
      </div></a></div></div>
      </div>
      <table class="w-full divide-y divide-gray-100 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
          <th class="text-left px-2 whitespace-nowrap uppercase text-gray-500 text-xxs tracking-wide py-2" v-for="(column,index) in columns">
            {{ columns[index] }}
          </th>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
          <tr class="group" v-for="(item,index) in data">
            <td class="px-2 py-2 cursor-pointer td-fit pr-5 dark:bg-gray-800 group-hover:bg-gray-50 dark:group-hover:bg-gray-900">
              <div v-if="index === 0">
                <span class="other-element">{{ item["id"] }}</span>
              </div>
              
            </td>
            <td class="px-2 py-2 cursor-pointer td-fit pr-5 dark:bg-gray-800 group-hover:bg-gray-50 dark:group-hover:bg-gray-900">
              {{ item["name"] }}
            </td>
            <td class="px-2 py-2 cursor-pointer td-fit pr-5 dark:bg-gray-800 group-hover:bg-gray-50 dark:group-hover:bg-gray-900">
              {{ item["email"] }}
            </td>
            <td class="px-2 py-2 cursor-pointer td-fit pr-5 dark:bg-gray-800 group-hover:bg-gray-50 dark:group-hover:bg-gray-900">
              {{ item["created_at"] }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script setup>
  import { ref,computed,onMounted } from 'vue'
  import { VOnboardingWrapper, useVOnboarding } from 'v-onboarding'
  import 'v-onboarding/dist/style.css'
  
  const wrapper = ref(null)
  const text = ref([]);
  const { start,goToStep,finish } = useVOnboarding(wrapper)
  
  const props = defineProps(['data','columns']);
  const data = computed(() => { return props.data });
  const columns = computed(() => { return props.columns });
  const steps = computed(() => {
    if(text.value.length > 0){
      return [
        { attachTo: { element: '.inertia-link-active' }, content: { title: text.value[0] } },
        {
          attachTo: { element: ".other-element" },
          content: { title: text.value[1] }
        },
        {
          attachTo: { element: ".other-element" },
          content: { title: text.value[1] }
        },
        {
          attachTo: { element: '.last-element' },
          content: {
            title: text.value[1],
          }
        },
        {
          attachTo: { element: '.last-element' },
          content: {
            title: text.value[2],
          }
        },
      ]
    }
    return [
      { attachTo: { element: '.inertia-link-active' }, content: { title: "My Element" } },
      { attachTo: { element: '#last-element' }, content: { title: "Last Element" } },
    ]
  })
  

  const getRoutes = (async () => {
    await Nova.request().get('/nova-vendor/user-onboarding/steps').then(response => {
      text.value = response.data;
    });
  })

  onMounted(async () => {
    await getRoutes();
    finish();
  })
</script>