from django.contrib import admin

from accounts.models import CustomUser, CustomUserProfile, CardPaymentMethod


admin.site.register(CustomUser)
admin.site.register(CustomUserProfile)
admin.site.register(CardPaymentMethod)
