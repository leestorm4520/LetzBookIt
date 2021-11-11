from django.db import models
from django.core.exceptions import ValidationError
from django.utils.translation import ugettext_lazy as _

from accounts.models import CustomUser

from address.models import AddressField
from multiselectfield import MultiSelectField


class Hotel(models.Model):
    # amenities
    AMENITY_CHOICES = (
            ("gym", "Gym"),
            ("pool", "Swimming Pool"),
            ("shuttle", "Shuttle"),
            )
    amenities = MultiSelectField(choices=AMENITY_CHOICES)

    address = AddressField()

    name = models.CharField(max_length=200)

    def __str__(self):
        return f"{self.name}"


class Room(models.Model):
    # where the room is located
    floor = models.PositiveSmallIntegerField()
    room_num = models.PositiveSmallIntegerField()

    # which hotel it's in
    hotel = models.ForeignKey(Hotel, on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.hotel}, Room {self.floor}{self.room_num}"


class Reservation(models.Model):
    # start and end date of the start
    start_date = models.DateField()
    end_date = models.DateField()

    # the customer who made the reservation and the room that is booked
    customer = models.ForeignKey(CustomUser, on_delete=models.CASCADE)
    room = models.ForeignKey(Room, on_delete=models.CASCADE)

    def clean(self):
        room_reservations = Reservation.objects.filter(room=self.room)
        if room_reservations.filter(start_date__lte=self.end_date).filter(end_date__gte=self.end_date) or  \
            room_reservations.filter(start_date__lte=self.start_date).filter(end_date__gte=self.start_date):

            raise ValidationError(_("Room booking  intersects with existing bookings"))

    def __str__(self):
        return f"Reservation from {self.start_date} to {self.end_date} on room {self.room} for customer {self.customer}"
