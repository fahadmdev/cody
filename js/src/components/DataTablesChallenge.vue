<template>
  <v-row>
    <v-col>
      <h2>Data Tables Challenge</h2>

      <p>See js/README.md for challenge instructions.</p>

      <v-data-table
      data-test-id="the-data-table"
      :headers="headers"
      :items="allLoanApplications"
      :sort-by="['lastNoteByCurrentUser']"
      :sort-desc="[true]"
      multi-sort
      >
        <template v-slot:item.lastNoteByCurrentUser="{ item }">
           <span>{{ timeSince(new Date(item.lastNoteByCurrentUser).getTime()) }}</span>
        </template>

        <template v-slot:item.timeInStatus="{ item }">
           <span>{{ timeSince(new Date(item.timeInStatus).getTime()) }}</span>
        </template>

        <template v-slot:item.updatedAt="{ item }">
           <span>{{ timeSince(new Date(item.updatedAt).getTime()) }}</span>
        </template>

      </v-data-table>
    </v-col>
  </v-row>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
  data: () => ({
    headers: [
      {
        align: 'start',
        text: 'App Id',
        value: 'id'
      },
      {
        text: 'Last',
        value: 'lastName'
      },
      {
        text: 'First',
        value: 'firstName'
      },
      {
        text: 'State',
        value: 'residenceState'
      },
      {
        text: 'Status',
        value: 'status'
      },
      {
        text: 'My Last Note',
        value: 'lastNoteByCurrentUser',
        sortable: true
      },
      {
        text: 'Time In Status',
        value: 'timeInStatus'
      },
      {
        text: 'Task',
        value: 'oldestOpenTask'
      },
      {
        text: 'Last Updated',
        value: 'updatedAt'
      }
    ]
  }),

  computed: {
    ...mapGetters({
      allLoanApplications: 'allLoanApplications'
    })
  },

  methods: {
    ...mapActions({
      loadLoanApplications: 'loadLoanApplications'
    }),
    timeSince (date) {
      var seconds = Math.floor((new Date() - date) / 1000);
      var interval = seconds / 31536000;
      if (interval > 1) {
        return Math.floor(interval) + ' years ago';
      }
      interval = seconds / 2592000;
      if (interval > 1) {
        return Math.floor(interval) + ' months ago';
      }
      interval = seconds / 86400;
      if (interval > 1) {
        return Math.floor(interval) + ' days ago';
      }
      interval = seconds / 3600;
      if (interval > 1) {
        return Math.floor(interval) + ' hours ago';
      }
      interval = seconds / 60;
      if (interval > 1) {
        return Math.floor(interval) + ' minutes ago';
      }
      return Math.floor(seconds) + ' seconds ago';
    }
  }
};
</script>
