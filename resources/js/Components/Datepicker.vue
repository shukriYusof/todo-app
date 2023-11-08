<template>
    <div class="datepicker">
        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="date" v-model="dateValue" @change="updateDataDate" :data-date="formattedDate" :data-date-format="dateFormat" :min="getMinDate()">
    </div>
</template>

<script>
import { ref, watch, computed, onMounted } from 'vue';
import moment from 'moment';

export default {
    props: {
    value: String,
    format: {
        type: String,
        default: 'YYYY-MM-DD'
    }
    },
    setup(props, { emit }) {
        const dateValue = ref(getInitialDateValue(props.value)); // Set the initial date
        const dateFormat = props.format;

        const formattedDate = computed(() => {
            return moment(dateValue.value, 'YYYY-MM-DD', true).format(dateFormat);
        });

        const updateDataDate = () => {
            emit('update:value', dateValue.value);
        };

        watch(dateValue, () => {
            updateDataDate();
        });

        // Function to get the initial date value
        function getInitialDateValue(value) {
            if (!value || !moment(value, 'YYYY-MM-DD', true).isValid()) {
            // Return the current date if the provided value is not valid
            return moment().format('YYYY-MM-DD');
            }
            return value;
        }

        function getMinDate() {
            return moment().format('YYYY-MM-DD');
        }

        onMounted(() => {
            updateDataDate();
        });

        return {
            dateValue,
            formattedDate,
            dateFormat,
            updateDataDate,
            getMinDate
        };
    },
};
</script>
<style lang="scss" scoped>

.datepicker {
    position: relative;
}

input {
    position: relative;
    height: 42px;
}

input[type=date]::before {
    content: attr(data-date);
    display: inline-block;
    color: black;
}

input::-webkit-datetime-edit, input::-webkit-inner-spin-button, input::-webkit-clear-button {
    display: none;
}

input::-webkit-calendar-picker-indicator {
    position: absolute;
    right: 10px;
    color: black;
    opacity: 1;
}
</style>
