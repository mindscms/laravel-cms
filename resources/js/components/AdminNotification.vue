<template>

    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter" v-if="unreadCount > 0">{{ unreadCount }}</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" v-if="unreadCount > 0">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>

            <a class="dropdown-item d-flex align-items-center" v-for="item in unread" :key="item.id" :href="`/admin/post_comments/${item.data.id}/edit`" @click="readNotifications(item)">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{ item.data.created_at }}</div>
                    <span class="font-weight-bold">There is a new comment on: {{ item.data.post_title }}</span>
                </div>
            </a>

        </div>
    </li>

</template>

<script>
    export default {
        data: function () {
            return {
                read: {},
                unread: {},
                unreadCount: 0
            }
        },
        created: function () {
            this.getNotifications();
            let adminId = $('meta[name="adminId"]').attr('content');
            Echo.private('App.User.' + adminId)
                .notification((notification) => {
                    this.unread.unshift(notification);
                    this.unreadCount++;
                });
        },
        methods: {
            getNotifications() {
                axios.get('/admin/notifications/get').then(res => {
                    this.read = res.data.read;
                    this.unread = res.data.unread;
                    this.unreadCount = res.data.unread.length;
                }).catch(error => Exception.handle(error))
            },
            readNotifications(notification) {
                axios.post('/admin/notifications/read', {id: notification.id}).then(res => {
                    this.unread.splice(notification,1);
                    this.read.push(notification);
                    this.unreadCount--;
                })
            }
        }
    }
</script>
