<?php


// Ограничение корзины на один продукт
// Cart limit per product
add_filter('woocommerce_add_to_cart_validation', 'limit_cart_to_one_product', 10, 3);
function limit_cart_to_one_product($passed, $product_id, $quantity) {
    if (WC()->cart->get_cart_contents_count() > 0) {
        // Если корзина не пустая, удаляем все существующие продукты перед добавлением нового
        WC()->cart->empty_cart();
    }
    return $passed;
}


// Добавление метабокса на странице редактирования товара
add_action('add_meta_boxes', 'my_meta_box');
function my_meta_box() {
    add_meta_box('my_meta_box_id', 'Will include a trial version upon registration', 'my_meta_box_callback', 'product', 'normal', 'default');
}

// Коллбэк функция для отображения метабокса
function my_meta_box_callback($post)
{
    // Получение текущего значения мета-данных
    $meta_value = get_post_meta($post->ID, 'some_time_trial', true);
    $first_text = get_post_meta($post->ID, 'some_time_input_text', true);
    $second_text = get_post_meta($post->ID, 'some_time_input_text_second', true);
    $third_text = get_post_meta($post->ID, 'some_time_input_text_third', true);
    ?>
    <p>
        <label class="stm_custom_fields">
            <input type="checkbox" name="some_time_trial" value="1" <?php checked($meta_value, '1'); ?>>
            <?php echo __('On/Off', 'wavytrades') ?>
        </label>
    <div style="display: flex; gap: 20px;">
        <div style="display: flex; flex-direction: column; gap: 10px">
            <?php echo __('First text', 'wavytrades') ?>
            <label class="stm_custom_fields">
                <textarea name="some_time_input_text" rows="3" cols="38"><?php echo $first_text ?></textarea>
            </label>
        </div>
        <div style="display: flex; flex-direction: column; gap: 10px">
            <?php echo __('Second text', 'wavytrades') ?>
            <label class="stm_custom_fields">
                <textarea name="some_time_input_text_second" rows="3" cols="38"><?php echo $second_text ?></textarea>
            </label>
        </div>

        <div style="display: flex; flex-direction: column; gap: 10px">
            <?php echo __('Third text', 'wavytrades') ?>
            <label class="stm_custom_fields">
                <textarea name="some_time_input_text_third" rows="3" cols="38"><?php echo $third_text ?></textarea>
            </label>
        </div>
    </div>
    </p>
    <?php
}


// Сохранение значения мета-данных при сохранении товара
add_action('save_post', 'save_some_time_trial');
function save_some_time_trial($post_id)
{
    if (isset($_POST['some_time_trial'])) {
        $meta_value = sanitize_text_field($_POST['some_time_trial']);
        update_post_meta($post_id, 'some_time_trial', $_POST['some_time_trial']);
        update_post_meta($post_id, 'some_time_input_text', $_POST['some_time_input_text']);
        update_post_meta($post_id, 'some_time_input_text_second', $_POST['some_time_input_text_second']);
        update_post_meta($post_id, 'some_time_input_text_third', $_POST['some_time_input_text_third']);
    }
}




