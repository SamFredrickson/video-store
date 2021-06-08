<template>
    <div class="modal fade" id="oldModer" tabindex="-1" role="dialog" aria-labelledby="oldModerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="oldModerLabel">Удаление модератора</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="old-email" class="col-form-label">Почта:</label>
            <input type="email" :class="['form-control', getValid]" @input="checkMail" id="old-email" name="email">
             <div class="invalid-feedback">
              Такой почты не найдено
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button v-if="!isValid" disabled type="button" class="btn btn-primary" data-dismiss="modal">Подтвердить</button>
         <button v-else type="button" class="btn btn-primary" data-dismiss="modal" @click="toggle">Подтвердить</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      isValid: false,
      userId: Number
    }
  },
  methods: {
      checkMail(event)
      {
          axios.get(`/user/mail/check`, { params: { email: event.target.value } })
          .then(response => {
              if( ! response.data ) this.isValid = false;
              else this.isValid = true;

              if( response.data ) this.userId = response.data.id;

          });
      },
      
       toggle(event)
      {
         axios.post(`/user/moder/toggle/${this.userId}`, { params: { form: 'old' } })
            .then(response => {
               console.log(response);
            }).catch(e => console.log(e));
      }
  },
  computed: {
    getValid: function(){
        return this.isValid ? 'is-valid' : 'is-invalid';
    }
  }
}
</script>