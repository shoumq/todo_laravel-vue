<template>
  <div class="index">
    <div class="flex">
      <table>
        <tr>
          <th class="fs16 thtable">Title</th>
          <th class="fs16 thtable">Description</th>
          <th class="fs16 thtable">Created_at</th>
          <th class="fs16 del">Delete</th>
        </tr>
        <tr v-for="(item, index) in jsonData" :key="index">
          <td class="fs16">{{ item.title }}</td>
          <td class="fs16">{{ item.desc }}</td>
          <td class="fs16">{{ getTime(item.created_at) }}</td>
          <td class="fs16">
            <a @click="delTask(item.id)" style="cursor: pointer;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3"
                viewBox="0 0 16 16">
                <path
                  d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
              </svg>
            </a>
          </td>
        </tr>
      </table>

      <form @submit.prevent="setTask" class="filter">
        <label for="title" style="font-size: 16rem; display: block;">Title
          <input type="text" name="title" id="title" v-model="title" trim>
        </label>
        <label for="title" style="font-size: 16rem; display: block;">Description
          <input type="text" name="desc" id="desc" v-model="desc" trim>
        </label>
        <button type="submit">Добавить</button>
      </form>
    </div>
  </div>
</template>

<script>

export default {
  name: 'IndexView',

  data() {
    return {
      title: '',
      desc: '',
      jsonData: []
    }
  },

  methods: {
    setTask() {
      this.axios.get('http://127.0.0.1:8000/api/task/add/' + this.title + '/' + this.desc)
      this.axios.get('http://127.0.0.1:8000/api/task/all')
        .then(response => {
          this.jsonData = response.data;
        })
    },

    getTasks() {
      this.axios.get('http://127.0.0.1:8000/api/task/all')
        .then(response => {
          this.jsonData = response.data;
        })
    },

    getTime(time) {
      return time.split('T')[0] + ' | ' + time.split('T')[1].split('.')[0]
    },

    delTask(id) {
      this.axios.get('http://127.0.0.1:8000/api/task/delete/' + id);
      this.axios.get('http://127.0.0.1:8000/api/task/all')
        .then(response => {
          this.jsonData = response.data;
        })
    }
  },

  mounted() {
    this.getTasks();
  }
}
</script>

<style scoped>
* {
  font-family: 'Nunito', sans-serif;
  user-select: none;
}

.flex {
  display: flex;
  gap: 30rem;
}

.index {
  width: 1300rem;
  margin: auto;
}

input {
  width: 200rem;
}

.filter {
  font-size: 20rem;
}

table {
  border-collapse: collapse;
  width: 100%;
}

td,
th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #ffffff;
}

.fs16 {
  font-size: 16rem;
}

.thtable {
  width: 500rem;
}

.del {
  width: 30rem;
}
</style>