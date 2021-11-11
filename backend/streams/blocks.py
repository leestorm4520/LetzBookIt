from django.db import models
import django.forms as forms

from wagtail.snippets.models import register_snippet
from wagtail.admin.edit_handlers import FieldPanel, FieldRowPanel, InlinePanel, MultiFieldPanel
from wagtail.images.edit_handlers import ImageChooserPanel
from wagtail.core import blocks
from wagtail.snippets.blocks import SnippetChooserBlock
from wagtail.images.blocks import ImageChooserBlock

from wagtail.contrib.forms.models import AbstractEmailForm, AbstractFormField
from modelcluster.fields import ParentalKey, ParentalManyToManyField
from wagtail.search import index


class HeroBlock(blocks.StructBlock):
    title = blocks.TextBlock()
    sub_title = blocks.TextBlock()
    image = ImageChooserBlock(required=False)
    button_text = blocks.TextBlock(required=False)
    button_link = blocks.URLBlock(required=False)
    video_text = blocks.TextBlock(required=False)
    video_link = blocks.URLBlock(required=False)

    class Meta:
        template = "streams/hero_block.html"


class DividerBlock(blocks.StructBlock):
    description = blocks.RichTextBlock(required=False, help_text="Any description you want for the divider")
    logos = blocks.ListBlock(ImageChooserBlock(required=False), blank=True, help_text="Any logos you might want to display on the divider")

    class Meta:
        template = "streams/divider_block.html"
        form_classname = "Divider / Logos"


class HotelBlock(blocks.StructBlock):
    image = ImageChooserBlock(icon="image")
    name = blocks.TextBlock(help_text="Name of the hotel being entered")
    tag_line = blocks.TextBlock(help_text="What the defining feature is")
    description = blocks.RichTextBlock(blank=True, help_text="Any extra information about this employee")
    twitter_url = blocks.URLBlock(required=False)
    facebook_url = blocks.URLBlock(required=False)
    instagram_url = blocks.URLBlock(required=False)
 
    class Meta:
        form_classname = "Hotel"


class HotelListBlock(blocks.StructBlock):
    title = blocks.TextBlock()
    description = blocks.TextBlock(required=False)
    # hotels = blocks.ListBlock(HotelBlock)

    class Meta:
        template = "streams/hotel_list_block.html"


class RoomBlock(blocks.StructBlock):
    image = ImageChooserBlock(icon="image")
    name = blocks.TextBlock(help_text="Name of the room being entered")
    tag_line = blocks.TextBlock(help_text="What the defining feature is")
    description = blocks.RichTextBlock(blank=True, help_text="Any extra information about this employee")
 
    class Meta:
        form_classname = "Room"


class RoomListBlock(blocks.StructBlock):
    title = blocks.TextBlock()
    description = blocks.TextBlock(required=False)
    # rooms = blocks.ListBlock(RoomBlock)

    class Meta:
        template = "streams/room_list_block.html"
