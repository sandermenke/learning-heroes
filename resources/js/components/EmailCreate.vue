<template>
    <div class="card col-md-12">
        <div class="card-body">
            <h1 class="card-title">Send Mail</h1>
            <form class="col-md-6">
                <div class="mb-3">
                    <label for="to" class="form-label">Email addresses (comma separated)</label>
                    <input type="text" class="form-control" id="to" v-model="emails" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" v-model="subject" required>
                </div>
                <div class="mb-3">
                    <label for="content_type" class="form-label">Content type</label>
                    <select class="custom-select" id="content_type" v-model="contentType">
                        <option value="text">Text</option>
                        <option value="markdown">Markdown</option>
                        <option value="html">HTML</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="10" v-model="message" required></textarea>
                </div>
                <a @click="sendEmail" class="btn btn-primary">Submit</a>
            </form>
        </div>
    </div>
</template>

<script>
    import marked from 'marked'

    export default {
        name: 'email-create',
        data: () => ({
            emails: '',
            subject: '',
            message: '',
            contentType: 'text'
        }),
        methods: {
            sendEmail() {
                if (!this.emails || !this.subject || !this.message) return false

                if (this.contentType !== 'html') {
                    this.message = marked(this.message)
                }

                axios.post('/api/mail', {
                    emails: this.emails,
                    subject: this.subject,
                    message: this.message,
                }).then(() => this.$router.push({ name: 'home' }))
            },
        }
    }
</script>
