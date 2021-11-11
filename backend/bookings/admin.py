from django.contrib import admin

from bookings.models import Hotel, Room, Reservation

admin.site.register(Hotel)
admin.site.register(Room)
admin.site.register(Reservation)

