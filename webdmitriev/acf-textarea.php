<?php

function add_acf_textarea_buttons_gutenberg_advanced() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Массив для отслеживания уже обработанных полей
        var processedFields = [];
        
        function addButtonsToTextarea($textarea) {
            var fieldKey = $textarea.closest('.acf-field').data('key');
            
            // Проверяем, не обрабатывали ли мы уже это поле
            if (processedFields.includes(fieldKey)) {
                return;
            }
            
            if ($textarea.length && !$textarea.siblings('.acf-textarea-buttons').length) {
                var $buttonGroup = $('<div class="acf-textarea-buttons" style="margin-bottom: 10px; padding: 8px; background: #f5f5f5; border: 1px solid #ddd; border-radius: 3px; display: flex; gap: 5px;"></div>');
                
                // Создаем кнопки
                var $btnA = $('<button type="button" class="button">A</button>')
                    .attr('title', 'Добавить ссылку')
                    .click(function() {
                        var selected = getSelection($textarea[0]);
                        if (selected.text) {
                            var url = prompt('Введите URL ссылки:', 'https://');
                            if (url) {
                                wrapText($textarea, 'a', selected, 'href="' + url + '"');
                            }
                        } else {
                            insertText($textarea, '<a href="https://">текст ссылки</a>');
                        }
                    });
                
                var $btnB = $('<button type="button" class="button">B</button>')
                    .attr('title', 'Жирный текст')
                    .click(function() {
                        var selected = getSelection($textarea[0]);
                        if (selected.text) {
                            wrapText($textarea, 'b', selected);
                        } else {
                            insertText($textarea, '<b>жирный текст</b>');
                        }
                    });
                
                var $btnSpan = $('<button type="button" class="button">SPAN</button>')
                    .attr('title', 'Добавить span')
                    .click(function() {
                        var selected = getSelection($textarea[0]);
                        if (selected.text) {
                            var className = prompt('Введите класс для span:', '');
                            var attrs = className ? 'class="' + className + '"' : '';
                            wrapText($textarea, 'span', selected, attrs);
                        } else {
                            insertText($textarea, '<span>текст</span>');
                        }
                    });
                
                $buttonGroup.append($btnA, $btnB, $btnSpan);
                $textarea.before($buttonGroup);
                
                // Добавляем поле в список обработанных
                processedFields.push(fieldKey);
            }
        }
        
        function getSelection(textarea) {
            return {
                start: textarea.selectionStart,
                end: textarea.selectionEnd,
                text: textarea.value.substring(textarea.selectionStart, textarea.selectionEnd)
            };
        }
        
        function wrapText($textarea, tag, selection, attributes) {
            var attrs = attributes ? ' ' + attributes : '';
            var wrapped = '<' + tag + attrs + '>' + selection.text + '</' + tag + '>';
            var newValue = $textarea.val().substring(0, selection.start) + 
                          wrapped + 
                          $textarea.val().substring(selection.end);
            
            $textarea.val(newValue).focus();
            
            // Восстанавливаем позицию курсора
            var newPos = selection.start + wrapped.length;
            $textarea[0].setSelectionRange(newPos, newPos);
        }
        
        function insertText($textarea, text) {
            var textarea = $textarea[0];
            var start = textarea.selectionStart;
            var newValue = textarea.value.substring(0, start) + 
                          text + 
                          textarea.value.substring(start);
            
            $textarea.val(newValue).focus();
            
            var newPos = start + text.length;
            textarea.setSelectionRange(newPos, newPos);
        }
        
        // Функция для поиска и инициализации полей ACF
        function initAcfFields() {
            $('.acf-field-textarea textarea').each(function() {
                addButtonsToTextarea($(this));
            });
        }
        
        // Запускаем инициализацию сразу
        initAcfFields();
        
        // Периодическая проверка для Гутенберга
        var initInterval = setInterval(function() {
            initAcfFields();
        }, 1000);
        
        // Останавливаем проверку через 30 секунд (опционально)
        setTimeout(function() {
            clearInterval(initInterval);
        }, 30000);
        
        // Обработчики событий
        $(document).on('acf/setup_fields', initAcfFields);
        
        // Для Гутенберга
        if (window.wp && wp.data && wp.data.subscribe) {
            wp.data.subscribe(function() {
                setTimeout(initAcfFields, 500);
            });
        }
    });
    </script>
    
    <style>
    .acf-textarea-buttons {
        background: #f8f9fa;
        border: 1px solid #dcdcde;
        border-radius: 4px;
        padding: 8px 12px;
    }
    .acf-textarea-buttons button {
        min-width: 40px;
        text-align: center;
    }
    .acf-textarea-buttons button:hover {
        transform: translateY(-1px);
    }
    </style>
    <?php
}
add_action('acf/input/admin_head', 'add_acf_textarea_buttons_gutenberg_advanced');