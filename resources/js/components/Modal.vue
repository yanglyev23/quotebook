<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal"
                 role="dialog"
                 aria-labelledby="modalTitle"
                 aria-describedby="modalDescription"
            >
                <header
                    class="modal-header"
                    id="modalTitle"
                >
                    <slot name="header">
                        <button
                            type="button"
                            class="close"
                            @click="close"
                            aria-label="Close modal"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </slot>
                </header>
                <section
                    class="modal-body"
                    id="modalDescription"
                >
                    <slot name="body">

                    </slot>
                    <form>
                        <div class="form-group">
                            <label for="text_citation">Текст</label>
                            <input v-model="form.body" type="text" name="text_citation" placeholder="Цитата" id="text_citation" class="form_control"></input>
                        </div>
                        <div class="form-group">
                            <label for="author">Автор</label>
                            <input v-model="form.author" type="text" name="author" placeholder="Автор" id="author" class="form_control">
                        </div>
                        <div class="form-group">
                            <label for="hashtag">Хэштег</label>
                            <input v-model="form.hashtag" name="hashtag" multiple list="hashtags" />
                            <datalist id="hashtags">
                                <option value="ЦитатаДня" />
                                <option value="ЦитатаМесяца" />
                                <option value="Тест1" />
                                <option value="Тест2" />
                                <option value="Тест3" />
                            </datalist>
                        </div>
                    </form>
                </section>
                <footer class="modal-footer">
                    <slot name="footer">
                        <button
                            type="button"
                            class="button"
                            @click.prevent="store"
                            aria-label="Close modal"
                        >
                            Опубликовать
                        </button>
                    </slot>
                </footer>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: 'modal',

    data: () => ({
        form: {
            body: "",
            author: "",
            hashtag: ""
        }
    }),

    methods: {
        close() {
            this.$emit('close');
        },
        store() {
            axios.post('/api/quotes', this.form, {
                headers: {
                    "Content-type": "application/json"
                }
            })
            .then (response => {
                if (response.data.status){
                    alert("Цитата успешно добавлена")
                    this.close();
                    this.$router.go(0);
                } else {
                    alert("Возникла ошибка при добавлении")
                }
            })
            .catch(err => {
                console.log(err.response.data)
            })
        }
    },
};
</script>

<style scoped>
.modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    height: 50%;
    width: 30%;
}

.modal-header,
.modal-footer {
    padding: 3%;
    display: flex;
    height: 7%;
}

.modal-header {
    border-bottom: 1px solid #eeeeee;
    color: #c90a47;
    justify-content: right;
}

.modal-footer {
    border-top: 1px solid #eeeeee;
    justify-content: center;
}

.modal-body {
    position: relative;
    padding: 3% 3%;
}

/* Full-width input fields */
input {
    width: 100%;
    padding: 4%;
    margin: 2% 0 2% 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input:focus {
    background-color: #ddd;
    outline: none;
}

</style>
