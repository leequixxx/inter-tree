<li class="tree__node">
    {{ $category->getName() }}
    @if(!$category->getChildren()->isEmpty())
        <ul class="tree__subtree">
            @foreach($category->getChildren()->getIterator() as $subcategory)
                @include('components.node', ['category' => $subcategory])
            @endforeach
        </ul>
    @endif
</li>