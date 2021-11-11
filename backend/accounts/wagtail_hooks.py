from wagtail.contrib.modeladmin.options import ModelAdmin, ModelAdminGroup, modeladmin_register 

from accounts.models import CustomUser, CustomUserProfile, CardPaymentMethod


from django.contrib import admin


class CustomerAdmin(ModelAdmin):
    model = CustomUser
    # menu_label = "Hotel"  
    menu_icon = "pick" 
    menu_order = 100 
    add_to_settings_menu = False 
    exclude_from_explorer = False 
    list_display = ("email", "date_joined",)
    list_filter = ("is_active", "date_joined",)
    search_fields = ("email","is_active","date_joined",)


class ProfileAdmin(ModelAdmin):
    model = CustomUserProfile
    # menu_label = "Hotel"  
    menu_icon = "pick" 
    menu_order = 100 
    add_to_settings_menu = False 
    exclude_from_explorer = False 
    list_display = ("last_name", "first_name", "user",)
    list_filter = ("first_name", "last_name", "user",)
    search_fields = ("first_name","last_name", "user")


class PaymentMethodAdmin(ModelAdmin):
    model = CardPaymentMethod
    # menu_label = "Hotel"  
    menu_icon = "pick" 
    menu_order = 100 
    add_to_settings_menu = False 
    exclude_from_explorer = False 
    list_display = ("cc_number", "cc_expiry",)
    list_filter = ("cc_number", "address",)
    search_fields = ("cc_number", "address", "cc_expiry",)


class CustomerManagementGroup(ModelAdminGroup):
    menu_label = "Customer Management" 
    menu_icon = "pick"
    menu_order = 500 
    items = (CustomerAdmin, ProfileAdmin, PaymentMethodAdmin,)


modeladmin_register(CustomerManagementGroup)
