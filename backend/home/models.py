from django.db import models

from wagtail.core.models import Page
from wagtail.core.fields import StreamField
from wagtail.admin.edit_handlers import StreamFieldPanel

from wagtailstreamforms.blocks import WagtailFormBlock

from streams import blocks as custom_blocks
from streams.models import GenericPage
from bookings.models import Hotel, Room


class HomePage(GenericPage):
    # the blocks that can be added to this page
    content = StreamField([
            ("hero", custom_blocks.HeroBlock()),
            ("divider", custom_blocks.DividerBlock()),
            ("form", WagtailFormBlock()),
            ("hotel_list", custom_blocks.HotelListBlock()),
        ],
        null=True,
        blank=True
        )

    # information editable in the admin interface
    content_panels = GenericPage.content_panels + [
            StreamFieldPanel("content")
            ]

    # sets the parent and children types
    parent_page_types = ["wagtailcore.Page"]
    subpage_types = ["home.HotelPage"]

    def get_context(self, request):
        context = super(HomePage, self).get_context(request)
        context['hotels'] = Hotel.objects.all()
        return context


class HotelPage(GenericPage):
    ...
#     content = StreamField([
#             ("hero", custom_blocks.HeroBlock()),
#             ("divider", custom_blocks.DividerBlock()),
#             ("form", WagtailFormBlock()),
#             ("room_list", custom_blocks.RoomListBlock()),
#         ],
#         null=True,
#         blank=True
#         )

#     # information editable in the admin interface
#     content_panels = GenericPage.content_panels + [
#             StreamFieldPanel("content")
#             ]

#     # sets the parent and children types
#     parent_page_types = ["home.HomePage"]
#     subpage_types = ["home.RoomPage"]

#     def get_context(self, request):
#         context = super(HotelPage, self).get_context(request)
#         context['rooms'] = Room.objects.filter(hotel=self.hotel)
#         return context


class RoomPage(GenericPage):
    ...
