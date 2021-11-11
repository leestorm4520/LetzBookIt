from wagtail.contrib.modeladmin.options import ModelAdmin, ModelAdminGroup, modeladmin_register 

from bookings.models import Hotel, Room, Reservation


class HotelAdmin(ModelAdmin):
    model = Hotel
    # menu_label = "Hotel"  
    menu_icon = "pick" 
    menu_order = 200 
    add_to_settings_menu = False 
    exclude_from_explorer = False 
    list_display = ("name",)
    list_filter = ("amenities",)
    search_fields = ("amenities",)


class RoomAdmin(ModelAdmin):
    model = Room
    # menu_label = "Hotel"  
    menu_icon = "pick" 
    menu_order = 300 
    add_to_settings_menu = False 
    exclude_from_explorer = False 
    list_display = ("name",)
    list_filter = ("hotel",)
    search_fields = ("hotel", "floor_num","room_num",)


class ReservationAdmin(ModelAdmin):
    model = Reservation
    # menu_label = "Hotel"  
    menu_icon = "pick" 
    menu_order = 100 
    add_to_settings_menu = False 
    exclude_from_explorer = False 
    list_display = ("start_date","end_date", "room",)
    list_filter = ("room__hotel", "customer", "start_date", "end_date",)
    search_fields = ("room__hotel","room", "customer")


class HotelManagementGroup(ModelAdminGroup):
    menu_label = "Hotel Management" 
    menu_icon = "pick"
    menu_order = 500 
    items = (HotelAdmin, RoomAdmin, ReservationAdmin,)


modeladmin_register(HotelManagementGroup)
