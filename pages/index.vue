<template>
  <v-card id="index" class="ma-12 pa-4">
    <v-form @submit.prevent="getJSON">
      <v-text-field type="text" v-model="height" required :error-messages="errorMessage" label="身長(m)"/>
      <v-btn>Send</v-btn>
    </v-form>
    <v-simple-table v-if="hasResult">
      <template v-slot:default>
        <thead>
        <tr>
          <th>
            低体重
          </th>
          <th>
            標準体重
          </th>
          <th>
            肥満
          </th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            {{result.minReq}}
          </td>
          <td>
            {{result.normal}}
          </td>
          <td>
            {{result.maxReq}}
          </td>
        </tr>
        </tbody>
      </template>
    </v-simple-table>
  </v-card>
</template>

<script>
  import Logo from '~/components/Logo.vue'
  import VuetifyLogo from '~/components/VuetifyLogo.vue'

  export default {
    data() {
      return {
        height: undefined,
        hasResult: false,
        result: {
          minReq: undefined,
          normal: undefined,
          maxReq: undefined,
        },
        errorMessage: ""
      }
    },
    methods: {
      getJSON() {
        // parse系の仕様で、100pxとか入れるとisNaNはfalseを返してくるので死んでほしい
        if (typeof this.height === "undefined" || this.height === "" || isNaN(parseFloat(this.height))) {
          this.errorMessage = "不正な値が入力されました";
          return
        } else {
          this.errorMessage = "";
        }

        // なのでここで無理やり文字列はかき消す
        $.getJSON(`http://localhost:12000/bmi.php?height=${parseFloat(this.height)}`)
          .done((array) => {
            this.result.minReq = array[0];
            this.result.normal = array[1];
            this.result.maxReq = array[2];
            this.hasResult = true;
          });
      }
    }
  }
</script>
