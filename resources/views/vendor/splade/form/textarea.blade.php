<SpladeTextarea
    {{ $attributes->only(['v-if', 'v-show', 'class']) }}
    :autosize="@js($attributes->has('autosize') ? (bool) $attributes->get('autosize') : $defaultAutosizeValue)"
    v-model="{{ $vueModel() }}"
>
    <label class="block">
        @includeWhen($label, 'splade::form.label', ['label' => $label])

        <textarea {{ $attributes->except(['v-if', 'v-show', 'class', 'autosize'])->class(
            'block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed'
        )->merge([
            'name' => $name,
            'v-model' => $vueModel(),
            'data-validation-key' => $validationKey(),
        ]) }}
        />
    </label>

    @includeWhen($help, 'splade::form.help', ['help' => $help])
    @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
</SpladeTextarea>
