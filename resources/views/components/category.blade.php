@props(['category'])
<a class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
    data-twe-collapse-init data-twe-ripple-init data-twe-ripple-color="light" href="#collapseExample" role="button"
    aria-expanded="false" aria-controls="collapseExample">
    {{ $category->title }} ({{ $category->id }})
</a>
@foreach ($category->children as $child)
    <div class="!visible hidden text-center" id="collapseExample" data-twe-collapse-item>
        <x-category :category="$child"></x-category>
    </div>
@endforeach

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
