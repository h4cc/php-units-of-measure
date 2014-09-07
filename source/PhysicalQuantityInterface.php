<?php
namespace PhpUnitsOfMeasure;

/**
 * classes which implement this interface represent individual physical quantities.
 */
interface PhysicalQuantityInterface
{
    /**
     * Fetch the measurement in the quantity's native unit of measure
     *
     * @return float the measurement cast to the native unit of measurement
     */
    public function toNativeUnit();

    /**
     * Fetch the measurement, in the given unit of measure
     *
     * @param  string $unit The desired unit of measure
     *
     * @return float The measurement cast in the requested units
     */
    public function toUnit($unit);

    /**
     * Display the value as a string, in the original unit of measure
     *
     * @return string The pretty-print version of the value, in the original unit of measure
     */
    public function __toString();

    /**
     * Add a given quantity to this quantity, and return a new quantity object.
     *
     * Note that the new quantity's original unit will be the same as this object's.
     *
     * Also note that the two quantities must represent the same physical quantity.
     *
     * @param PhysicalQuantityInterface $quantity The quantity to add to this one
     *
     * @throws \PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch when there is a mismatch between physical quantities
     *
     * @return PhysicalQuantityInterface the new quantity
     */
    public function add(PhysicalQuantityInterface $quantity);

    /**
     * Subtract a given quantity from this quantity, and return a new quantity object.
     *
     * Note that the new quantity's original unit will be the same as this object's.
     *
     * Also note that the two quantities must represent the same physical quantity.
     *
     * @param PhysicalQuantityInterface $quantity The quantity to subtract from this one
     *
     * @throws \PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch when there is a mismatch between physical quantities
     *
     * @return PhysicalQuantityInterface the new quantity
     */
    public function subtract(PhysicalQuantityInterface $quantity);

    /**
     * Multiple a given quantity by this quantity, and return a new quantity object.
     *
     * The new quantity will be a derived quantity who's unit will be the
     * multiplication of the original quantity's unit.
     *
     * @param PhysicalQuantityInterface $quantity The value by which to multiply this unit.
     *
     * @return AbstractDerivedPhysicalQuantity
     */
    public function multiplyBy(PhysicalQuantityInterface $quantity);

    /**
     * Divide this quantity by a given quantity, and return a new quantity object.
     *
     * The new quantity will be a derived quantity who's unit will be the
     * this quantity's units divided by the given quantity's unit.
     *
     * @param PhysicalQuantityInterface $quantity The value by which to divide this unit.
     *
     * @return AbstractDerivedPhysicalQuantity
     */
    public function divideBy(PhysicalQuantityInterface $quantity);
}