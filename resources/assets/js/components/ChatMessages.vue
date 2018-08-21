<template>
    <ol class="chat" id="chat-tab" ref="chatTab">
        <li v-for="message in messages" v-bind:key="message.id" v-bind:class="getClass(message)">
            <div class="avatar"><img src="/img/users/user.png" draggable="false"/></div>
            <div class="msg">
                <div class="user">{{ getName(message) }}</div>
                <p>{{ message.message }}</p>
                <time>{{ getTime(message) }}</time>
            </div>
        </li>
    </ol>
</template>

<script>
  export default {
    props: ['messages', 'user', 'name'],

    methods: {
        getName(message) {
            var check = this.user.id === message.user.id
            if (check) {
                return message.user.name
            } else {
                return this.name
            }
        },

        getClass(message) {
            var check = this.user.id === message.user.id
            return {
                'self': check,
                'other': !check
            }
        },
        
        getTime(message) {
            return message.created_at.substr(11, 5);
        }
    },

    watch: {
        messages: {
            handler(n, o) {
                var messageDisplay = this.$refs.chatTab;
                messageDisplay.scrollTop = messageDisplay.scrollHeight;
            },
            deep: true
        },
    }
  };
</script>