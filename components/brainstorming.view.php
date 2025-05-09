<?php
class Brainstorming {
    private $icon;
    private $idea1;
    private $idea2;
    private $color;

    public function __construct($icon, $idea1, $idea2, $color) {
        $this->icon = $icon;
        $this->idea1 = $idea1;
        $this->idea2 = $idea2;
        $this->color = $color;
    }

    public function render() {
        $html = '<div  class="flex flex-col items-center  gap-4 mb-4">';

        $html .= '<div  class="p-4 rounded-full w-fit items-center ' . htmlspecialchars($this->color) . '">';
        $html .= '<div class="text-2xl">' . $this->icon . '</div>';
        $html .= '</div>';

        $html .= '<div  class=" px-4 py-2 w-fit rounded-2xl bg-black flex items-center gap-2">';
        $html .= '<div class="w-2 h-2  rounded-full ' . htmlspecialchars($this->color) . ' "></div>';
        $html .= '<p class="text-white font-medium">' . htmlspecialchars($this->idea1) . '</p>';
        $html .= '</div>';

        $html .= '<div  class=" px-4 py-2 w-fit rounded-2xl bg-black flex items-center justify-center gap-2">';
        $html .= '<div class="w-2 h-2  rounded-full ' . htmlspecialchars($this->color) . ' "></div>';
        $html .= '<p class="text-white font-medium">' . htmlspecialchars($this->idea2) . '</p>';
        $html .= '</div>';


        $html .= '</div>';
        return $html;
    }
}
?>