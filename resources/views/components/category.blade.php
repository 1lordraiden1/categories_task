@props(['category'])


{{ $category->title }} ({{ $category->id }})
<ul>
    @foreach ($category->children as $child)
        <li><x-category :category="$child"></x-category></li>
    @endforeach
</ul>

<script>
    $(document).ready(function() {
        $(".multiLevelDropdownButton").each(function(_, dropdown) {
            const dropdownMenu = $(dropdown).find("> .multi-dropdown")[0];
            let popperInstance = null;

            function create() {
                popperInstance = Popper.createPopper(dropdown, dropdownMenu, {
                    placment: 'auto-start',
                    strategy: 'absolute',
                    modifires: [{
                        name: "flip",
                        options: {
                            fallbackPlacements: ["top", "bottom", "left", "right"],
                        }
                    }]
                });
            }

            function destroy() {
                if (popperInstance) {
                    popperInstance.destroy();
                    popperInstance = null;
                }
            }

            function show() {
                $(dropdownMenu).attr('data-show', "");
                create();
            }

            function hide() {
                $(dropdownMenu).removeAttr('data-show');
                destroy();
            }

            $(dropdown).on("mouseenter focus", show);
            $(dropdown).on("mouseenter blur", hide);

        });
    });
</script>
