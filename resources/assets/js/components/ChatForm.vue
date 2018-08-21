<template>
    
    <div class="typezone">
        <input id="btn-input" type="text" name="message" class="form-control" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">
        <!-- <textarea type="text" name="message" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage"></textarea> -->
    </div>
    <!-- <div class="typezone">
        <textarea type="text" name="message" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage"></textarea>
    </div> -->
    
</template>

<script>
    export default {
        props: ['user', 'to'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage,
                    created_at: new Date().toLocaleString(),
                    to_id: this.to
                });

                this.newMessage = ''
            }
        }    
    }
</script>