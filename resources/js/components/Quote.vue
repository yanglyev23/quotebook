<template>
    <div id="card_citation">
        <!-- Форма цитаты -->
        <div class="form_citation">
            <p>"-
                {{ body }}
                "</p>
        </div><!-- form_citation -->

        <!-- Информация о цитате -->
        <div class="inf_citation">
            <!-- Автор цитаты -->
            <div class="author_citation">
                <p>{{ author }}</p>
            </div>

            <!-- Дата цитаты -->
            <div class="date_citation">
                <p>
                    <time datetime="2022-07-01T20:00">{{ date }}</time>
                </p>
            </div>

            <!-- Теги цитаты -->
            <div class="tag_citation">
                <a>{{ hashtag }}</a>
            </div>

        </div><!-- inf_citation -->
    </div><!-- card_citation -->
</template>

<script>
export default {
    name: "Quote",
    props: {
        body: {
            type: String,
            default: "NULL"
        },
        author: {
            type: String,
            default: "NULL"
        },
        hashtag: {
            type: String,
            default: "NULL"
        },
        date: {
            type: String,
            default: "NULL"
        }
    }
}
</script>

<style scoped>

</style>
